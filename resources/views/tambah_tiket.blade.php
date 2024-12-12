<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Tiket</title>
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
        }

        .container-lg {
            background-color: #CDEDFF;
            width: 500px;
            margin-top: 80px;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Button Logout */
        .btn-logout {
            margin-bottom: 15px; /* Mengubah jarak tombol logout */
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
                <a class="nav-link" href="{{ url('/kelola_pengguna') }}">Kelola Pengguna</a>
            </div>
        </div>
    </div>
</nav>
<!-- end navbar -->

    <!-- Main content area -->
    <div class="main-container">
        <div class="container-lg">
            <h2 class="text-center">Tambah Tiket Maskapai</h2>
            <form>
                <div class="mb-3">
                    <label for="maskapai" class="form-label">Nama Maskapai</label>
                    <input type="text" class="form-control" id="maskapai" placeholder="Masukkan Nama Maskapai" required>
                </div>
                <div class="mb-3">
                    <label for="kodePenerbangan" class="form-label">Kode Penerbangan</label>
                    <input type="text" class="form-control" id="kodePenerbangan" placeholder="Masukkan Kode Penerbangan" required>
                </div>
                <div class="mb-3">
                    <label for="asal" class="form-label">Asal</label>
                    <input type="text" class="form-control" id="asal" placeholder="Masukkan Asal (Contoh: CGK - Jakarta)" required>
                </div>
                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input type="text" class="form-control" id="tujuan" placeholder="Masukkan Tujuan (Contoh: SUB - Surabaya)" required>
                </div>
                <div class="mb-3">
                    <label for="waktuKeberangkatan" class="form-label">Waktu Keberangkatan</label>
                    <input type="time" class="form-control" id="waktuKeberangkatan" required>
                </div>
                <div class="mb-3">
                    <label for="noKursi" class="form-label">No Kursi</label>
                    <input type="text" class="form-control" id="noKursi" placeholder="Masukkan No Kursi" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Tambah Tiket</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end main content -->

    <!-- Script JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
