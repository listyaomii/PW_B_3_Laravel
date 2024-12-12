<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tiket</title>

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
            flex-wrap: wrap; /* Agar konten tidak tumpang tindih di layar yang lebih kecil */
        }

        .card-body div {
            margin: 10px 0;
        }

        .card-body h2, .card-body strong, .card-body span {
            margin-right: 10px;
        }

        .card {
            width: 100%; /* Pastikan card memiliki lebar 100% */
            max-width: 100%; /* Membatasi lebar maksimum */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        img{
            border-radius: 50%;
            border: solid 1px #D3D3D3;
            width: 40px;
            height:40px;
        }

        .input-group {
            background-color: #f0f4ff;
            border-radius: 30px;
            padding: 10px;
        }

        .input-group-text {
            background-color: #f0f4ff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            color: #333;
        }

        .btn-light {
            background-color: white;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .fa-plane-departure, .fa-plane-arrival, .fa-exchange-alt {
            margin-right: 10px;
        }

        .rounded-start-pill {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .rounded-end-pill {
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
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
            flex-wrap: wrap; /* Agar elemen di dalamnya dapat beralih ke baris berikutnya jika diperlukan */
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .divider {
            height: 2px;
            width:100px;
            background-color: #D3D3D3;
            margin: 10px 0;
        }

    @media (max-width: 768px) {
    .input-group {
        width: 100% !important;
    }

    .card {
        width: 100%;
        padding: 15px; /* Mengurangi padding pada layar kecil */
    }

    .card-body h2, .card-body strong, .card-body span {
        font-size: 1rem; /* Ukuran teks lebih kecil */
    }

    img {
        width: 30px;
        height: 30px; /* Membuat gambar logo lebih kecil */
    }

    .d-flex {
        flex-wrap: wrap; /* Membuat flex-wrap pada elemen dengan kelas .d-flex */
    }

    .card-body div {
        flex: 1 1 100%; /* Setiap div akan menggunakan lebar 100% pada layar kecil */
    }

    .btn-container {
        margin-left: 0;
    }
}

@media (max-width: 576px) {
    .input-group {
        width: 100% !important;
        font-size: 0.9rem;
    }

    .card {
        padding: 10px; /* Sesuaikan padding untuk layar kecil */
    }

    .card-body h2, .card-body strong, .card-body span {
        font-size: 0.9rem; /* Ukuran teks lebih kecil */
    }

    .d-flex {
        flex-wrap: wrap;
    }

    .card-body div {
        flex: 1 1 100%; /* Setiap div akan menggunakan lebar 100% pada layar sangat kecil */
    }

    img {
        width: 25px;
        height: 25px;
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
                  <!-- <a class="nav-link" href="#">Login</a> -->
                  <a class="nav-link" href="{{url('/profile')}}"><i class="bi bi-person-fill"></i></a>
              </div>
          </div>
      </div>
    </nav>

    <div class="container d-flex mt-5 justify-content-center">
        <div class="input-group mt-5" style="width: 30%; justify-content: start;">
            <span class="input-group-text rounded-start-pill" id="from">
                <i class="fas fa-plane-departure"></i>
                Jakarta (CGK)
            </span>
            <span class="input-group-text rounded-center-pill">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="input-group-text rounded-end-pill" id="to">
                <i class="fas fa-plane-arrival"></i>
                Bali (DPS)
            </span>
        </div>
        <div class="input-group mt-5 ms-5" style="width: fit-content;">
            <span class="input-group-text rounded-pill" id="date">
                <i class="fas fa-calendar me-2"></i>
                <?php echo date('D, d-M-Y')?>
            </span>
        </div>
        <div class="input-group mt-5 ms-5" style="width: fit-content;">
            <span class="input-group-text rounded-start-pill">
                <i class="fas fa-person me-2" style="font-size:20px;"></i>
                1
            </span>
            <span class="input-group-text rounded-center-pill">
                |
            </span>
            <span class="input-group-text rounded-end-pill">
                <!-- <span style="margin-left: 25px; text-align: end;"> -->
                    Ekonomi
                <!-- </span> -->
            </span>
        </div>
        <div class="btn-container mt-5 ms-5">
            <a href="{{url('/tiket')}}" class="btn btn-outline-primary" style="width:100px;">Ubah</a>
        </div>
    </div>

    @forelse($tiketList as $item)
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 40vh;">
        <div class="card mt-5" style="box-shadow:0 0 10px rgba(0, 0, 0, 0.1); border-radius:40px; width:fit-content;">
            <div class="card-body justify-content-center">
                <div class="d-flex justify-content-between align-items-center"> 
                    <div class="d-flex align-items-center"> 
                        <img src="imgs/transNusa.jpeg" alt="logo transNusa" style="margin-right:10px;">
                        <strong><?php echo $item['maskapai']?></strong>
                        <i class="ms-2 fas fa-suitcase"></i>
                    </div>
                    <div class="d-flex align-items-center mx-5">
                        <div class="mb-0 me-3">
                            <h2><?php echo $item['jamBerangkat']?></h2>
                            <p><?php echo $item['berangkat']?></p>
                        </div>
                        <div class="mb-0 ms-3 me-3">
                            <p><?php echo $item['durasi']?></p>
                            <p class="divider"></p>
                            <p><?php echo $item['tipe']?></p>
                        </div>
                        <div class="mb-0 ms-3">
                            <h2><?php echo $item['jamTiba']?></h2>
                            <p><?php echo $item['tujuan']?></p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end"> <!-- Harga -->
                        <h2 class="mb-0">IDR <?php echo $item['harga']?></h2>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-end mt-auto ms-5">
                    <a href="{{ url('/tiketDetail')}}" class="btn btn-success" style="width:100px;">Pilih</a>
                </div>
            </div>
        </div>
        </div>
        @empty
        @endforelse

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
</html>



