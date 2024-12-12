<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rincian Refund</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Navbar */
        .navbar .nav-link {
            color: #000;
        }

        .navbar .nav-link.active {
            color: black;
            font-weight: bold;
        }

        .navbar {
            background-color: #CDEDFF;
            margin-bottom: 0px;
        }

        /* Body */
        body {
            padding-top:80px;
            font-family: 'Alegreya', serif;
            font-size: 20px;
            background-color: #F8F9FA;
        }

        /* SVG (Waves) */
        svg {
            display: block;
            width: 100%;
            height: auto;
            margin-top: -20px;
            margin-bottom: -20px;
        }

        /* Container */
        .container-lg {
            background-color: #E1F5FF;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            margin: 40px auto; /* Mengatur margin atas dan bawah */
            max-width: 1000px; /* Mengatur lebar maksimum */
        }

        /* Ticket Card */
        .ticket-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .ticket-card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        /* Header Ticket */
        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        /* Ticket Details */
        .ticket-details {
            display: flex;
            justify-content: space-between;
        }

        .ticket-details div {
            text-align: center;
        }

        .ticket-footer {
            text-align: right;
            margin-top: 10px;
        }

        /* Title */
        h2 {
            color: black;
            padding-top: 0px;
            text-align: center;
            font-weight: bold;
            font-size: 32px;
        }

        /* Badge Airline */
        .badge-airline {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Flight Icons */
        .flight-icon {
            font-size: 30px;
            margin-bottom: 10px;
            color: #007bff;
            transition: color 0.3s ease;
        }

        .flight-icon:hover {
            color: #0056b3;
        }

        /* Footer */
        .ticket-footer span {
            font-weight: bold;
            font-size: 16px;
            color: #333;
        }


        .refund-summary {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }


        /* Responsive Design */
        @media (max-width: 576px) {
            body {
                font-size: 16px; /* Ukuran font lebih kecil untuk ponsel */
            }

            h2 {
                font-size: 28px; /* Ukuran judul lebih kecil untuk ponsel */
            }

            .ticket-details {
                flex-direction: column; /* Ubah layout untuk ponsel */
            }

            .ticket-details div {
                margin-bottom: 10px; /* Spasi antara elemen */
            }
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
                    <a class="nav-link" href="{{url('/home')}}">Home</a>
                    <a class="nav-link" href="{{ url('/tiket') }}">Tiket</a>
                    <a class="nav-link active" aria-current="page" href="{{url('/pesanan')}}">Pesanan</a>
                    <a class="nav-link" href="{{url('/refund')}}">Refund</a>
                    <a class="nav-link" href="{{url('/profile')}}"><i class="bi bi-person-fill"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- Title -->
    <h2 class="text-center">Rincian Refund</h2>

    <!-- ticket card -->
    <div class="container-lg">
        <div class="ticket-card">
            <div class="ticket-header">
                <span class="badge-airline">Garuda Indonesia</span>
                <span>Kode Penerbangan: GA 124</span>
            </div>
            <div class="ticket-details">
                <div>
                    <i class="fas fa-plane-departure flight-icon"></i>
                    <p><strong>CGK</strong></p>
                    <p>Jakarta</p>
                    <p>09:00</p>
                </div>
                <div>
                    <i class="fas fa-clock"></i>
                    <p>Durasi: 1h 40m</p>
                </div>
                <div>
                    <i class="fas fa-plane-arrival flight-icon"></i>
                    <p><strong>SUB</strong></p>
                    <p>Surabaya</p>
                    <p>10:40</p>
                </div>
            </div>
            <div class="ticket-footer">
                <span>No Kursi: 14B</span>
            </div>
        </div>
    </div>
    <!-- end ticket card -->

    <!-- Refund Summary -->
    <div class="container-lg">
        <div class="d-flex justify-content-between align-items-center refund-summary">
            <div>
                Total Refund : <br>
                <strong style="font-size:40px;">IDR 300.000</strong>
            </div>
            <button type="button" class="btn btn-danger btn-submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Ajukan Refund</a>
        </div>
    </div>
    
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Yakin ingin mengajukan refund?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a href="{{url('/refund')}}" type="button" class="btn btn-primary">Yakin</a>
            </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
