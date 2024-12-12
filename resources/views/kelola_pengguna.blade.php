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
            justify-content: center; /* Pusatkan secara horizontal */
            flex: 1;
            padding: 20px;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #CDEDFF;
            border-radius: 10px;
            margin-top: 80px;
            margin-left: 20px;
            max-height: 90%;
            max-width: 70%;
            margin-right: 20px;
        }

        /* Refund Ticket Card */
        .refund-ticket-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .refund-ticket-card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        /* Button Logout */
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
                <a class="nav-link" href="{{ url('/kelola_tiket') }}">Tambah Tiket</a>
                <a class="nav-link" href="{{ url('/kelola_pengguna') }}">Kelola Refund</a>
            </div>
        </div>
    </div>
</nav>
<!-- end navbar -->

    <!-- Main content area -->
    <div class="main-container">
        <!-- Card untuk konfirmasi refund -->
        <div class="content">
            <h2 class="refund-title text-center">Konfirmasi Refund Tiket</h2>

            <!-- Refund Ticket Card -->
            <div class="refund-ticket-card">
                <div class="ticket-header">
                    <span class="badge bg-primary">Garuda Indonesia</span>
                    <span class="float-end">Kode Penerbangan: GA 123</span>
                </div>
                <div class="ticket-details">
                    <p><strong>Asal:</strong> CGK - Jakarta</p>
                    <p><strong>Tujuan:</strong> SUB - Surabaya</p>
                    <p><strong>Waktu Keberangkatan:</strong> 08:30</p>
                    <p><strong>No Kursi:</strong> 12A</p>
                    <p><strong>Jumlah Refund:</strong> Rp 1.500.000</p>
                </div>
                <div class="refund-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-success" onclick="showToast('konfirmasi')">Konfirmasi Refund</button>
                    <button type="button" class="btn btn-danger" onclick="showToast('tolak')">Tolak Refund</button>
                </div>
            </div>
            <!-- end Refund Ticket Card -->

            <!-- Refund Ticket Card -->
            <div class="refund-ticket-card">
                <div class="ticket-header">
                    <span class="badge bg-primary">Lion Air</span>
                    <span class="float-end">Kode Penerbangan: JT 456</span>
                </div>
                <div class="ticket-details">
                    <p><strong>Asal:</strong> CGK - Jakarta</p>
                    <p><strong>Tujuan:</strong> BPN - Balikpapan</p>
                    <p><strong>Waktu Keberangkatan:</strong> 10:00</p>
                    <p><strong>No Kursi:</strong> 15B</p>
                    <p><strong>Jumlah Refund:</strong> Rp 900.000</p>
                </div>
                <div class="refund-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-success" onclick="showToast('konfirmasi')">Konfirmasi Refund</button>
                    <button type="button" class="btn btn-danger" onclick="showToast('tolak')">Tolak Refund</button>
                </div>
            </div>
            <!-- end Refund Ticket Card -->

            <!-- Refund Ticket Card -->
            <div class="refund-ticket-card">
                <div class="ticket-header">
                    <span class="badge bg-primary">Sriwijaya Air</span>
                    <span class="float-end">Kode Penerbangan: SJ 789</span>
                </div>
                <div class="ticket-details">
                    <p><strong>Asal:</strong> CGK - Jakarta</p>
                    <p><strong>Tujuan:</strong> PKU - Pekanbaru</p>
                    <p><strong>Waktu Keberangkatan:</strong> 12:30</p>
                    <p><strong>No Kursi:</strong> 8C</p>
                    <p><strong>Jumlah Refund:</strong> Rp 1.200.000</p>
                </div>
                <div class="refund-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-success" onclick="showToast('konfirmasi')">Konfirmasi Refund</button>
                    <button type="button" class="btn btn-danger" onclick="showToast('tolak')">Tolak Refund</button>
                </div>
            </div>
            <!-- end Refund Ticket Card -->
        </div>
    </div>
    <!-- end main content -->

    <!-- Toast Notification -->
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="refundToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notifikasi</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toast-message">
                <!-- Pesan toast akan diisi dengan JavaScript -->
            </div>
        </div>
    </div>

    <!-- Script JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        function showToast(action) {
            var toastEl = document.getElementById('refundToast');
            var toastMessageEl = document.getElementById('toast-message');
            var toast = new bootstrap.Toast(toastEl);

            if (action === 'konfirmasi') {
                toastMessageEl.innerText = 'Tiket berhasil dikonfirmasi refund.';
            } else {
                toastMessageEl.innerText = 'Refund tiket telah ditolak.';
            }

            toast.show();
        }
    </script>
</body>
</html>
