<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - AtmaTicket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Figtree', Helvetica, Arial, sans-serif;
            background: url('imgs/bg.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .navbar {
            background-color: #f8f9fa;
        }
        .navbar a {
            color: #000;
            margin-right: 15px;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
        }
        .btn-primary {
            background-color: #00c3ff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #007bb5;
        }
        .btn-secondary {
            background-color: #005d75;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #003b4c;
        }
        .form-text {
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AtmaTicket</a>
        </div>
    </nav>

    <div class="login-container">
        <h2>Log in</h2>
        <form id="loginForm">
            <div class="mb-3">
                <label for="role" class="form-label">Login Sebagai</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="user" selected>User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username anda" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password anda" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
            <div class="form-text">
                Belum punya akun? <a href="{{url('/Register')}}" class="btn btn-secondary btn-block">Daftar</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            const role = document.getElementById('role').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Tentukan endpoint berdasarkan role
            const endpoint = role === 'admin' 
                ? '{{ url("/api/admin/login") }}' 
                : '{{ url("/api/user/login") }}';

            // Mengirim data login ke backend API
            fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ username: username, password: password }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.token) {
                    // Simpan token di localStorage atau sessionStorage
                    localStorage.setItem('auth_token', data.token);

                    // Fetch user or admin data after login
                    fetchUserData(role, data.token);
                } else {
                    alert('Login gagal: ' + (data.message || 'Periksa kembali username dan password Anda.'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghubungi server. Coba lagi.');
            });
        });

        function fetchUserData(role, token) {
            const endpoint = role === 'admin' 
                ? '{{ url("/api/admin/data") }}' 
                : '{{ url("/api/user/data") }}';

            // Fetch data after successful login
            fetch(endpoint, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`,
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log('User/Admin Data:', data);
                // Redirect after fetching user data
                if (role === 'admin') {
                    window.location.href = '/admin';
                } else {
                    window.location.href = '/home';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengambil data pengguna. Coba lagi.');
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDeMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
