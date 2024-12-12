<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengelolaan Master Data Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .navbar {
            background-color: #CDEDFF;
        }

        body {
            font-family: 'Alegreya', serif;
            font-size: 20px;
            background-color: #F8F9FA;
        }

        .container-lg {
            margin-top: 80px;
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
    <div class="container-lg">
        <h2 class="text-center">Pengelolaan Master Data Tiket</h2>
        
        <!-- Tabel Data Tiket -->
        <div class="mb-3">
        <a href="{{ url('/tambah_tiket') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
            Tambah Tiket
        </a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Maskapai</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>Waktu Keberangkatan</th>
                    <th>Waktu Tiba</th>
                    <th>Durasi Penerbangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Garuda Indonesia</td>
                    <td>CGK - Jakarta</td>
                    <td>SUB - Surabaya</td>
                    <td>08:30</td>
                    <td>10:00</td>
                    <td>1 jam 30 menit</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete()">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Lion Air</td>
                    <td>CGK - Jakarta</td>
                    <td>BPN - Balikpapan</td>
                    <td>10:00</td>
                    <td>12:00</td>
                    <td>2 jam</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete()">Hapus</button>
                    </td>
                </tr>
                <!-- Tambahkan data tiket lainnya di sini -->
            </tbody>
        </table>
    </div>
    <!-- end main content -->

    <!-- Modal Tambah Tiket -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="maskapai" class="form-label">Maskapai</label>
                            <input type="text" class="form-control" id="maskapai" required>
                        </div>
                        <div class="mb-3">
                            <label for="asal" class="form-label">Asal</label>
                            <input type="text" class="form-control" id="asal" required>
                        </div>
                        <div class="mb-3">
                            <label for="tujuan" class="form-label">Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" required>
                        </div>
                        <div class="mb-3">
                            <label for="waktuKeberangkatan" class="form-label">Waktu Keberangkatan</label>
                            <input type="time" class="form-control" id="waktuKeberangkatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="waktuTiba" class="form-label">Waktu Tiba</label>
                            <input type="time" class="form-control" id="waktuTiba" required>
                        </div>
                        <div class="mb-3">
                            <label for="durasiPenerbangan" class="form-label">Durasi Penerbangan</label>
                            <input type="text" class="form-control" id="durasiPenerbangan" required placeholder="Contoh: 1 jam 30 menit">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan Tiket</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Tiket -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editMaskapai" class="form-label">Maskapai</label>
                            <input type="text" class="form-control" id="editMaskapai" value="Lion Air" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAsal" class="form-label">Asal</label>
                            <input type="text" class="form-control" id="editAsal" value="CGK - Jakarta" required>
                        </div>
                        <div class="mb-3">
                            <label for="editTujuan" class="form-label">Tujuan</label>
                            <input type="text" class="form-control" id="editTujuan" value="BPN - Balikpapan" required>
                        </div>
                        <div class="mb-3">
                            <label for="editWaktuKeberangkatan" class="form-label">Waktu Keberangkatan</label>
                            <input type="time" class="form-control" id="editWaktuKeberangkatan" value="10:00" required>
                        </div>
                        <div class="mb-3">
                            <label for="editWaktuTiba" class="form-label">Waktu Tiba</label>
                            <input type="time" class="form-control" id="editWaktuTiba" value="12:00" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDurasiPenerbangan" class="form-label">Durasi Penerbangan</label>
                            <input type="text" class="form-control" id="editDurasiPenerbangan" value="2 jam" required>
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

    <!-- Script JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        function confirmDelete() {
            if (confirm('Apakah Anda yakin ingin menghapus tiket ini?')) {
                // Logika penghapusan tiket
                alert('Tiket berhasil dihapus.');
            }
        }
    </script>
</body>
</html>
