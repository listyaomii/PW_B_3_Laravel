<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .navbar {
            background-color: #CDEDFF;
            margin-bottom: 0px;
        }

        body {
            font-family: 'Alegreya', serif;
            font-size: 20px;
            background-color: #F8F9FA;
        }

        .main-container {
            display: flex;
            flex: 1;
            padding: 20px;
            margin-top: 80px;
        }

        .admin-info,
        .dashboard {
            background-color: #CDEDFF;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .admin-info {
            width: 400px;
            margin-right: 20px; /* Add space between admin info and dashboard */
        }

        .dashboard {
            flex: 1;
        }

        .content {
            padding: 20px 40px;
            background-color: #CDEDFF;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin: 0 auto; /* Center the content */
        }

        .profile-title {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
            font-size: 20px;
        }

        .dashboard-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dashboard-card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        /* Table Styles */
        .user-table {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-logout {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-plane-departure me-2"></i> Atma Ticket Admin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ url('/admin') }}">Admin</a>
                    <a class="nav-link" href="{{ url('/kelola_tiket') }}">Tambah Penerbangan</a>
                    <a class="nav-link" href="{{ url('/kelola_pengguna') }}">Kelola Refund</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- Main content area -->
    <div class="main-container">
        <!-- Admin Info Section -->
        <div class="admin-info">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Admin Info</h2>
                    <p class="card-text">Nama: <strong>admin</strong></p>
                    <p class="card-text">Email: <strong>admin@gmail.com</strong></p>
                    <p class="card-text">Password: <strong>********</strong></p>
                    <div class="d-flex justify-content-center">
                        <a href="{{url('/Login')}}" type="button" class="btn btn-danger btn-logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Section -->
        <div class="dashboard">
            <h2 class="text-center">Dashboard</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="dashboard-card text-center">
                        <h3>Jumlah Pengguna</h3>
                        <p class="display-4">120</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dashboard-card text-center">
                        <h3>Jumlah Konfirmasi Refund</h3>
                        <p class="display-4">15</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dashboard-card text-center">
                        <h3>Jumlah Penerbangan</h3>
                        <p class="display-4">50</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Table Section -->
    <div class="main-container d-flex justify-content-center align-items-start">
        <div class="content">
            <h2 class="text-center">Daftar Akun Pengguna</h2>

            <div class="user-table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal1">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete()">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>jane.smith@example.com</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal2">Edit</button>
                                <button class="btn btn-danger btn-sm"  onclick="confirmDelete()">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Robert Johnson</td>
                            <td>robert.johnson@example.com</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal3">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete()">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end main content -->

    <!-- Edit User Modal -->
    <div class="modal fade" id="editModal1" tabindex="-1" aria-labelledby="editModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel1">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editName1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="editName1" value="John Doe">
                        </div>
                        <div class="mb-3">
                            <label for="editEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail1" value="john.doe@example.com">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="editModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel2">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editName2" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="editName2" value="Jane Smith">
                        </div>
                        <div class="mb-3">
                            <label for="editEmail2" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail2" value="jane.smith@example.com">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal3" tabindex="-1" aria-labelledby="editModalLabel3" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel3">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editName3" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="editName3" value="Robert Johnson">
                        </div>
                        <div class="mb-3">
                            <label for="editEmail3" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail3" value="robert.johnson@example.com">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        function confirmDelete() {
            if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
                alert('User berhasil dihapus.');
            }
        }
    </script>
</body>

</html>
