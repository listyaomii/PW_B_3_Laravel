<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <style>
        .card-body {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .card-body div {
            margin: 10px 0;
        }

        .card-body h2, .card-body strong, .card-body span {
            margin-right: 10px;
        }

        .card {
            width: 100%;
            max-width: 100%;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-light {
            background-color: white;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .fa-plane-departure, .fa-plane-arrival, .fa-exchange-alt {
            margin-right: 10px;
        }

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

        footer {
            background-color: #CDEDFF;
        }

        body {
            font-family: 'Alegreya', serif;
            font-size: 20px;
        }

        .content {
            margin-top: 100px; 
        }

        .btn-container {
            display: flex;
            align-items: center;
            margin-left: 20px; 
        }

        .d-flex {
            flex-wrap: wrap;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .divider {
            height: 2px;
            width: 100%;
            background-color: #D3D3D3;
            margin: 10px 0;
        }

        img {
            border-radius: 50%;
            border: solid 1px #D3D3D3;
            width: 40px;
            height: 40px;
        }

        .text-center {
            text-align: center;
        }

        .vertical-line {
            position: relative;
            width: 2px;
            height: 400px;
            background-color: #d1d5db;
            margin-left: 20px;
            margin-right: 20px;
        }

        .circle {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #e5e7eb;
            border-radius: 50%;
            left: 50%;
            transform: translateX(-50%);
        }

        .circle.top {
            top: 0;
        }

        .circle.bottom {
            bottom: 0;
        }

        @media (max-width: 768px) {
            .card {
                width: 100%;
                padding: 15px;
            }

            .card-body h2, .card-body strong, .card-body span {
                font-size: 1rem;
            }

            .d-flex {
                flex-wrap: wrap;
            }

            .card-body div {
                flex: 1 1 100%;
            }

            .btn-container {
                margin-left: 0;
            }

            img {
                width: 30px;
                height: 30px;
            }
        }

        @media (max-width: 576px) {
            .card {
                padding: 10px;
            }

            .card-body h2, .card-body strong, .card-body span {
                font-size: 0.9rem;
            }

            .d-flex {
                flex-wrap: wrap;
            }

            img {
                width: 30px;
                height: 30px;
            }

            .card-body div {
                flex: 1 1 100%;
            }
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

    <div class="mt-5 pt-5">
        <h1 style="text-align:center;">Detail Tiket</h1>
    </div>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 10vh;">
        <div class="card mt-5" style="box-shadow:0 0 10px rgba(0, 0, 0, 0.1); border-radius:40px; width:fit-content;">
            <div class="card-body justify-content-center">
                <table>
                    <tr>
                        <td>
                            {{$tiket->penerbangan->tanggal}}
                        </td>
                        <td></td>
                        <td><span class="badge rounded-pill text-bg-secondary text-end">{{$tiket->kelas}}</span></td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;"><strong>{{ $tiket->penerbangan->waktu_keberangkatan }} </strong>
                        <!-- <br>{{ \Carbon\Carbon::parse($tiket->waktu_keberangkatan) }}</td> -->
                        <td rowspan="6">
                            <div class="vertical-line">
                                <span class="circle top"></span>
                                <span class="circle bottom"></span>
                            </div>
                        </td>
                        <!-- Paragraf panjang di kolom ke-3 -->
                        <td style="vertical-align:top; padding-left:20px;">
                            {{ $tiket->penerbangan->bandara_asal }}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td rowspan="4" style="vertical-align:top; text-align:start; padding-left:20px;">
                            <div class="card">
                                <div class="d-flex align-items-center" style="gap: 10px;"> 
                                    <img src="imgs/transNusa.jpeg" alt="logo transNusa" style="margin-bottom: 10px;">
                                    <strong>{{ $tiket->penerbangan->maskapai }}</strong>
                                </div>
                                <div class="divider"></div>
                                <p><strong>Tiket Sudah Termasuk</strong></p>
                                <p style="font-size:16px;"><i class="ms-2 fas fa-suitcase me-3"></i> Kabin 7 kg + Bagasi 20 kg</p>
                            </div>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr rowspan="3" style="vertical-align:bottom;">
                        <td><strong>{{ $tiket->penerbangan->waktu_kedatangan }}</strong>
                        <!-- <br>{{ \Carbon\Carbon::parse($tiket->penerbangan->waktu_kedatangan) }}</td> -->
                        <td style="padding-left:20px;">{{ $tiket->penerbangan->bandara_tujuan }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        const today = new Date();
        const dayName = days[today.getDay()];
        const day = today.getDate();
        const month = months[today.getMonth()];
        const year = today.getFullYear();

        const formattedDate = `${dayName}, ${day} ${month} ${year}`;

        document.getElementById('current-date').textContent = formattedDate;
    </script>
</body>
<footer class="text-center mt-5">
    <div class="container p-4">
        <div class="row align-items-center">
            <div class="col-lg-6 text-lg-start">
                <h1><strong>IDR {{ number_format($tiket->harga, 0, ',', '.') }}</strong></h1>
            </div>
            <div class="col-lg-6 text-lg-end">
                <a href="{{ url('/formPemesanan/'.$tiket->id_tiket) }}" class="btn btn-primary btn-lg">Pesan Sekarang</a>
            </div>
        </div>
    </div>
</footer>
</html>
