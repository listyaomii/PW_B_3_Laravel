<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Tiket</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <style>

        .navbar .nav-link {
            color: #000;
        }

        .navbar .nav-link.active {
            color: black;
            font-weight: bold;
        }

        .custom-navbar {
        background-color: #CDEDFF; /* Warna tomat */
        }

        .custom-navbar .navbar-nav .nav-link {
            color: black; /* Mengubah warna teks */
            font-weight: 100;
            
        }

        .navbar {
          background-color: #CDEDFF;
          margin-bottom: 0px;
        }

        body {
          font-family: 'Alegreya', serif;
          background-color: #CDEDFF;
          font-size: 20px;
        }

        .full-width-image {
            width: 100%;
            height: auto;
        }

        .divider {
            height: 2px;
            background-color: white;
            margin: 10px 0;
        }
        .recommendation-card {
            border-radius: 50px;
            overflow: hidden;
            width:600px;
            height: 300px;
            margin-bottom: 50px;
        }

        .recommendation-card .card-img {
            object-fit: cover;
            height: 100%;
            filter: brightness(80%);
        }

        .recommendation-card:hover{
            transform: scale(1.03);
        }

        .card-img-overlay {
            color: white;
            background: rgba(0, 0, 0, 0.4); /* Overlay semi-transparan */
            border-radius: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-price {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .arrow {
            font-size: 1.5rem;
            align-self: flex-end;
        }

        .form-container {
            width: 70%;
            position: absolute;
            top: 60%; /* Menempatkan form di tengah vertikal */
            left: 50%; /* Menempatkan form di tengah horizontal */
            transform: translate(-50%, -50%); /* Mengatur posisi form ke tengah */
            background-color: #CDEDFF; /* Warna latar belakang putih dengan transparansi */
            border-radius: 50px;
            padding: 30px; /* Padding untuk form */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Bayangan */
        }

        .btn{
            width:100px;
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
<div>
    <div class="position-relative">
        <img class="full-width-image" src="imgs/airport.jpg" alt="Gambar Bandara">
        <h1 class="card-title position-absolute" style="top: 0; left: 50%; transform: translateX(-50%); color: black; text-align: center; margin: 100px 0;
        font-size: 60px;">
            Find the Best Flights for Your Journey!
        </h1>
        <div class="form-container">
        <form id="searchForm" action="{{ route('tiketView') }}" method="GET">
            <div class="row">
                <div class="col mb-3">
                    <label for="from" class="form-label">Dari</label>
                    <select class="form-select" id="from" name="from" required>
                        <option value="" disabled selected>Berangkat dari mana?</option>
                        @foreach ($bandaraAsalList as $asal)
                            <option value="{{ $asal }}">{{ $asal }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="class" class="form-label">Kelas</label>
                    <select class="form-select" id="class" name="class" required>
                        <option value="" disabled selected>Pilih Kelas Kursi</option>
                        @foreach ($kelasList as $kls)
                            <option value="{{ $kls }}">{{ $kls }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="to" class="form-label">Ke</label>
                    <select class="form-select" id="to" name="to" required>
                        <option value="" disabled selected>Mau ke mana?</option>
                        @foreach ($bandaraTujuanList as $tujuan)
                            <option value="{{ $tujuan }}">{{ $tujuan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <script>
            // Fungsi untuk menangani form submit dan pengalihan
            document.getElementById('searchForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah form dari reset otomatis

                // Ambil nilai input dari form
                var from = document.getElementById("from").value;
                var to = document.getElementById("to").value;
                var classType = document.getElementById("class").value;
                var date = document.getElementById("date").value;

                // Bangun URL query string
                var url = '{{ route("tiketView") }}' + "?from=" + from + "&to=" + to + "&class=" + classType + "&date=" + date;

                // Redirect ke halaman tiketView dengan query string
                window.location.href = url;
            });
        </script>

        </div>
    </div>
</div>

<div class="container my-5">
    <h3 class="mb-4">Rekomendasi</h3>
    <div class="row">
        <!-- Card 1 -->
        <div class="col-lg-6 col-md-12 mb-3">
            <div class="card recommendation-card">
                <img src="imgs/bali.jpg" class="card-img" alt="Bali">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <p class="card-text">Flight from Jakarta <br>to</p>
                    <h5 class="card-title">Bali</h5>
                    <p class="divider"></p>
                    <p class="card-text">Starts from:</p>
                    <h6 class="card-price">Rp 659.000</h6>
                    <a href="{{url('/tiketView')}}" class="arrow" style="color: white;">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="col-lg-6 col-md-12 mb-3">
            <div class="card recommendation-card">
                <img src="imgs/jogja.jpg" class="card-img" alt="Bali">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <p class="card-text">Flight from Jakarta <br>to</p>
                    <h5 class="card-title">Yogyakarta</h5>
                    <p class="divider"></p>
                    <p class="card-text">Starts from:</p>
                    <h6 class="card-price">Rp 659.000</h6>
                    <a href="{{url('/tiketView')}}" class="arrow" style="color: white;">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-3">
            <div class="card recommendation-card">
                <img src="imgs/bajo.jpg" class="card-img" alt="Bali">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <p class="card-text">Flight from Jakarta <br>to</p>
                    <h5 class="card-title">Labuan Bajo</h5>
                    <p class="divider"></p>
                    <p class="card-text">Starts from:</p>
                    <h6 class="card-price">Rp 659.000</h6>
                    <a href="{{url('/tiketView')}}" class="arrow" style="color: white;">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-3">
            <div class="card recommendation-card">
                <img src="imgs/medan.jpg" class="card-img" alt="Bali">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <p class="card-text">Flight from Jakarta <br>to</p>
                    <h5 class="card-title">Medan</h5>
                    <p class="divider"></p>
                    <p class="card-text">Starts from:</p>
                    <h6 class="card-price">Rp 659.000</h6>
                    <a href="{{url('/tiketView')}}" class="arrow" style="color: white;">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeo9w2MHAe0XlWJHrD/GA6iDh/s4n2bWXsb6YhShu5ZHQ3h" crossorigin="anonymous">
    const validateForm = () => {
    alert("Data Anda Berhasil Disimpan !");
    window.location.href = "{{ route('tiketView') }}";  // Atau sesuaikan ke halaman lain jika perlu
    return false;
}
</script>
</html>