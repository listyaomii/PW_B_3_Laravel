<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .register-container {
            max-width: 800px;
            margin: 100px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .register-container h2 {
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
    <div class="container register-container">
        <h2>Register</h2>
        <form action="{{ route('user.register') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama_user" id="name" placeholder="Masukkan Nama anda" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email_user" id="email" placeholder="Masukkan E-mail anda" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password anda" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username anda" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="address" placeholder="Masukkan Alamat anda" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="phone" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" name="telp_user" id="phone" placeholder="Masukkan nomor telepon anda" required>
        </div>
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>

    <div class="form-text mt-3">
        Sudah punya akun? <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    </div>
</form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
