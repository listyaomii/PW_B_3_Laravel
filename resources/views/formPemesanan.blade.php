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

        footer{
            width:100%;
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
            width:100%;
            background-color: #D3D3D3;
            margin: 10px 0;
        }

        img{
            border-radius: 50%;
            border: solid 1px #D3D3D3;
            width: 40px;
            height:40px;
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

    <div class="mt-5 ps-5 pt-5">
        <h3 style="text-align:start;">Data Penumpang</h3>
    </div>

    <!-- form penumpang  -->
    <div class="d-flex justify-content-start">
        <div class="card ms-5 me-5">
        <form action="{{ route('penumpang.store') }}" method="POST">
            @csrf
            <!-- radio  -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="title_penumpang" id="tuan" value="Tuan">
                <label class="form-check-label" for="inlineRadio1">Tuan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="title_penumpang" id="nyonya" value="Nyonya">
                <label class="form-check-label" for="inlineRadio2">Nyonya</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="title_penumpang" id="nona" value="Nona">
                <label class="form-check-label" for="inlineRadio3">Nona</label>
            </div>

            <!-- Nama, hp, email -->
            <div class="mb-3 mt-3">
                <label for="nama" class="form-label" style="font-size:16px;"><strong>Nama Lengkap</strong></label>
                <input type="text" class="form-control" id="nama" name="nama_lengkap" placeholder="Nama Depan & Nama Belakang penumpang" required>
            </div>
            <!-- <div class="mb-3 mt-2">
                <label for="email" class="form-label" style="font-size:16px;"><strong>E-mail</strong></label>
                <input type="text" class="form-control" id="email" name="email" placeholder="email@gmail.com" required>
            </div> -->
            <div class="mb-3 mt-2">
                <label for="identitas" class="form-label" style="font-size:16px;"><strong>Nomor Identitas</strong></label>
                <input type="text" class="form-control" id="identitas" name="no_identitas" placeholder="Nomor KTP/Passport" required>
            </div>
            <div class="mb-3 mt-2">
                <label for="hp" class="form-label" style="font-size:16px;"><strong>Nomor Telepon</strong></label>
                <input type="text" class="form-control" id="hp" name="no_telp" placeholder="Masukkan 11-13 digit" required>
            </div>
            <div class="mb-3 mt-2">
                <label for="tglLahir" class="form-label" style="font-size:16px;"><strong>Tanggal Lahir</strong></label>
                <input type="date" class="form-control" id="tglLahir" name="tgl_lahir" required>
            </div>
            <div class="mb-3 mt-2">
                <label for="wargaNegara" class="form-label" style="font-size:16px;"><strong>Kewarganegaraan</strong></label>
                <select class="form-select form-select-sm" id="wargaNegara" name="kewarganegaraan" aria-label="Medium select example" required>
                    <option value="" disabled selected>pilih warga negara</option>
                    <option value="indonesia">Indonesia</option>
                    <option value="thailand">Thailand</option>
                    <option value="malaysia">Malaysia</option>
                    <option value="singapore">Singapore</option>
                    <option value="filipina">Philipina</option>
                    <option value="australia">Australia</option>
                    <option value="korea">Korea Selatan</option>
                    <option value="jepang">Jepang</option>
                    <option value="kamboja">Kamboja</option>
                </select>
            </div>
            <footer class="text-center text-lg-center mt-5">
                <div class="container p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-lg">Lanjutkan</button>
                        </div>
                    </div>
                </div>
            </footer>
        </form>

        </div>
    </div>

    <script>
        // const validateForm = () => {
        //     const radioButtons = document.getElementsByName('title_penumpang');
        //     const isRadioSelected = Array.from(radioButtons).some(radio => radio.checked);

        //     if (!isRadioSelected) {
        //         alert("Pilih Tuan/Nyonya/Nona terlebih dahulu!");
        //         return false; // Cegah form disubmit
        //     }

        //     return true; // Validasi berhasil, form akan disubmit
        // };

</script>

</body>
</html>