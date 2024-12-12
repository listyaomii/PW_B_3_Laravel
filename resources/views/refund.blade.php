<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesanan Refund</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .navbar .nav-link {
            color: #000;
        }

        .navbar .nav-link.active {
            color: black;
            font-weight: bold;
        }

        .custom-navbar {
            background-color: #CDEDFF; 
        }

        .custom-navbar .navbar-nav .nav-link {
            color: black; 
            font-weight: 100;
        }

        .navbar {
            background-color: #CDEDFF;
            margin-bottom: 0px;
        }

        body {
            font-family: 'Alegreya', serif;
            font-size: 20px;
            background-color: #F8F9FA;
        }

        svg {
            display: block;
            width: 100%;
            height: auto;
            margin-top: -20px; 
        }

        /* Container Refund */
        .container-refund {
            background-color: #E1F5FF;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            margin: 100px auto;
            width: 80%; 
        }

        /* Title Refund */
        .refund-title {
            text-align: center;
            color: #007bff;
            font-weight: bold;
            font-size: 32px;
            margin-bottom: 20px;
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

        /* Button Refund */
        .btn-refund {
            background-color: #ff4757;
            color: #fff;
        }

        .btn-refund:hover {
            background-color: #e84118;
        }

            /* Toast Customization */
        .toast {
        min-width: 300px; /* Lebar minimal toast */
        font-size: 18px; /* Ukuran font */
        }

        .toast-body {
            font-weight: bold; /* Menebalkan teks */
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-plane-departure me-2"></i> Atma Ticket
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                    <a class="nav-link" href="{{ url('/tiket') }}">Tiket</a>
                    <a class="nav-link" href="{{url('/pesanan')}}">Pesanan</a>
                    <a class="nav-link active" aria-current="page" href="{{url('/refund')}}">Refund</a>
                    <a class="nav-link" href="{{url('/profile')}}"><i class="bi bi-person-fill"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- Refund Container -->
    <div class="container-refund">
        <h2 class="refund-title">History Refund Tiket</h2>

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
            </div>
        </div>

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
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
