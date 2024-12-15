<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Style untuk navbar */
        .navbar {
            background-color: #CDEDFF;
            margin-bottom: 0px;
        }

        body {
            font-family: 'Alegreya', serif;
            font-size: 20px;
            height: 100vh; /* Agar tinggi halaman 100% viewport */
            margin: 0;
            display: flex;
            flex-direction: column; /* Flexbox untuk mengatur layout */
        }

        .main-container {
            display: flex;
            flex: 1; /* Memastikan konten di dalam mengambil seluruh sisa tinggi halaman */
        }

        .container-lg {
            background-color: #CDEDFF;
            max-height: 70%; /* Agar memanjang ke bawah */
            width: 400px; /* Sesuaikan lebar kontainernya */
            margin-top: 80px; /* Jarak dari navbar */
            border-radius: 10px;
            padding: 20px; /* Menambahkan padding */
            margin-left: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Tambahkan style agar isi konten ada di sebelah kanan kontainer */
        .content {
            flex: 1;
            padding: 20px;
            background-color: #CDEDFF;
            border-radius: 10px;
            margin-top: 80px; /* Sama dengan margin container sebelah */
            margin-left: 20px;
            max-height: 90%;
            max-width: 70%;
            margin-right: 20px;
        }

        .img-fluid {
            width: 150px;
            height: 150px;
            border-radius: 50%; /* Membuat gambar menjadi lingkaran */
            margin: 0 auto;
            display: block;
        }

        .profile-title {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
            font-size: 20px;
        }

        .profile-details {
            list-style-type: none;
            padding: 0;
            font-size: 18px;
        }

        .profile-details li {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #ccc;
            padding: 8px 0;
        }

        .profile-details li span {
            font-weight: bold;
        }

        /* Style untuk form edit profile */
        .form-edit {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-edit input,
        .form-edit select {
            width: 100%;
            margin-bottom: 15px;
        }

        .form-edit .btn {
            margin-right: 10px;
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
                  <a class="nav-link" href="{{url('/pesanan')}}">Pesanan</a>
                  <a class="nav-link" href="{{url('/refund')}}">Refund</a>
                  <!-- <a class="nav-link" href="#">Login</a> -->
                  <a class="nav-link active" aria-current="page" href="{{url('/profile')}}"><i class="bi bi-person-fill"></i></a>
              </div>
          </div>
      </div>
    </nav>
    <!-- end navbar -->

    <!-- Main content area -->
    <div class="main-container">
        <!-- container yang ada di sebelah kiri -->
        <div class="container-lg">
            <h2 class="text-center">Profile</h2>
            <!-- Bagian foto profil -->
<img src="{{ $fotoUrl }}" alt="Profile Picture" class="img-fluid">

<!-- Bagian data user -->
@if($user)
    <h3 class="profile-title">{{ $user->nama_user ?? 'Nama Tidak Tersedia' }}</h3>
    <ul class="profile-details">
        <li><span>Nomor Telepon:</span> {{ $user->telp_user ?? 'Tidak ada' }}</li>
        <li><span>Email:</span> {{ $user->email_user ?? 'Tidak ada' }}</li>
        <li><span>Alamat:</span> {{ $user->alamat ?? 'Tidak ada' }}</li>
    </ul>
@else
    <h1>Pengguna tidak ditemukan</h1>
@endif
            <!-- Tombol Logout dengan modal -->
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-outline-danger" style="margin-top: 20px;" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    Logout
                </button>
                <button type="button" class="btn btn-outline-danger ms-3" style="margin-top: 20px;" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    Delete Account
                </button>
            </div>
        </div>

        <!-- content di sebelah kanan kontainer -->
        <div class="content">
            <!-- Form Edit Profile -->
            <h4>Data Pribadi</h4>
            <form class="form-edit" action="{{ route('user.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="uploadFoto" class="form-label">Ubah Foto Profil</label>
        <input type="file" class="form-control" id="uploadFoto" name="foto" accept="image/*">
    </div>
    <div class="mb-3">
        <label for="namaLengkap" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="namaLengkap" name="nama_user" value="{{ $user->nama_user }}" placeholder="Masukkan Nama Lengkap">
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email_user" value="{{ $user->email_user }}" placeholder="Masukkan Email">
    </div>
    <div class="mb-3">
        <label for="noHp" class="form-label">No. Handphone</label>
        <input type="tel" class="form-control" id="noHp" name="telp_user" value="{{ $user->telp_user }}" placeholder="No. Handphone">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $user->alamat }}" placeholder="Alamat">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn btn-secondary" onclick="confirmSimpan('Batal')">Batal</button>
</form>
        </div>
    </div>
    <!-- end main content -->

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route('logout') }}" type="button" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete Account -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountModalLabel">Delete Account Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('user.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Account</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Script JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <!-- Tempatkan script JavaScript Anda di sini -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const formEdit = document.querySelector(".form-edit");
        const profileDetails = document.querySelectorAll(".profile-details li");

        formEdit.addEventListener("submit", function(event) {
            // Hapus preventDefault agar form bisa submit
            // event.preventDefault(); 

            // Optional: Validasi sederhana
            const namaLengkap = document.getElementById("namaLengkap").value;
            const email = document.getElementById("email").value;
            const noHp = document.getElementById("noHp").value;
            const alamat = document.getElementById("alamat").value;

            if (!namaLengkap || !email || !noHp || !alamat) {
                alert("Mohon isi semua field");
                event.preventDefault();
                return;
            }
        });
    });

    function confirmSimpan(action) {
        if (action === 'Batal') {
            return confirm('Apakah Anda yakin ingin membatalkan perubahan?');
        }
        return true;
    }
</script>
</body>
</html>