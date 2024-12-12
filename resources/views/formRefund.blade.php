<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Refund</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            padding-top: 80px;
            font-family: 'Alegreya', serif;
            background-color: #F8F9FA;
            font-size:20px;
        }

        .navbar {
            background-color: #CDEDFF;
        }

        .navbar .nav-link {
            color: #000;
        }

        .navbar .nav-link.active {
            color: black;
            font-weight: bold;
        }

        .container-lg {
            background-color: #E1F5FF;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            margin: 40px auto;
            max-width: 600px;
        }

        h2 {
            color: black;
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        
        /* Responsive Design */
        @media (max-width: 576px) {
            .container-lg {
                padding: 20px;
            }

            h2 {
                font-size: 28px;
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

    <!-- Refund Form -->
    <div class="container-lg">
        <h2>Form Pengajuan Refund</h2>
        <form onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="bookingCode" class="form-label">Kode Booking</label>
                <input type="text" class="form-control" id="bookingCode" placeholder="Masukkan kode booking" required>
            </div>

            <div class="mb-3">
                <label for="noRekening" class="form-label">Nomor Rekening</label>
                <input type="text" class="form-control" id="noRekening" placeholder="Masukkan nomor rekening" required>
            </div>
            
            <div class="mb-3">
                <label for="pemilikRekening" class="form-label">Nama Pemilik Rekening</label>
                <input type="text" class="form-control" id="pemilikRekening" placeholder="Masukkan nama pemilik rekening" required>
            </div>
            <div class="mb-3">
                <label for="alasan" class="form-label">Alasan Refund</label>
                <textarea class="form-control" id="alasan" rows="3" placeholder="Masukkan alasan pengajuan refund" required></textarea>
            </div>
            <button type="submit" class="btn btn-submit btn-block">Ajukan Refund</button>
        </form>
    </div>
    <!-- End Refund Form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const validateForm=()=>{
            alert("Data berhasil disimpan");
            window.location.href = "{{url('/rincianRefund')}}";
            return false;
        }

    </script>
</body>
</html>
