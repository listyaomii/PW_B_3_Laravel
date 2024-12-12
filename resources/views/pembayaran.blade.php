<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Tiket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <style>
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


        body {
            font-family: 'Alegreya', serif;
            font-size: 20px;
        }

        .container {
            margin-top: 100px;
        }

        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 40px;
            padding: 40px;
        }

        #qrcode {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
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
                  <a class="nav-link active" aria-current="page" href="{{ url('/tiket') }}">Tiket</a>
                  <a class="nav-link" href="{{url('/pesanan')}}">Pesanan</a>
                  <a class="nav-link" href="{{url('/refund')}}">Refund</a>
                  <a class="nav-link" href="{{url('/profile')}}"><i class="bi bi-person-fill"></i></a>
              </div>
          </div>
      </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 60vh;">
        <div class="card mt-2 mb-5">
            <h3>Scan QR Code untuk Pembayaran</h3>
            <div id="qrcode" class="mb-5"></div>
            <div class="text-center mt-3">
                <button id="confirm-payment" class="btn btn-primary btn-lg">Konfirmasi Pembayaran</button>
            </div>
        </div>
    </div>

    <script>
        var paymentLink = "https://www.dana.id/"; 
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: paymentLink,
            width: 200,  
            height: 200  
        });

        document.getElementById('confirm-payment').addEventListener('click', function() {
      
            alert('Pembayaran Berhasil!');

            window.location.href = "{{ url('/e-ticket') }}";
        });
    </script>
</body>
</html>
