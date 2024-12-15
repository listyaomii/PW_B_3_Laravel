<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\PenerbanganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\AdminController;


Route::get('/home', function () {
    // Cek apakah user sudah login dan memiliki role user
    if (!session()->has('user') || session('user.role') !== 'user') {
        return redirect()->route('login')->with('error', 'Anda tidak memiliki akses');
    }
    return view('home');
})->name('home');

Route::get('/login', [UserController::class, 'loginForm'])->name('login');

Route::get('/', function () {
    return view('Login');
})->name('login'); // Optional if you want the homepage to also use the login page

// Define the register route
Route::resource('/user', UserController::class);
Route::get('/register', [UserController::class, 'registerForm'])->name('user.register');
Route::post('/login', [UserController::class, 'login'])->name('user.login');  // Corrected route
Route::post('/register', [UserController::class, 'register'])->name('user.register.post');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

Route::get('/pesanan', function () {
    return view('pesanan');
});

// Route::prefix('tiket')->group(function () {
//     // Route untuk pencarian tiket
//     Route::get('/', [TiketController::class, 'search'])->name('tiket.search');
    
//     // Route untuk menampilkan halaman tiket
//     Route::get('/index', function () {
//         return view('tiket', ['tikets' => \App\Models\Tiket::with('penerbangan')->get()]);
//     })->name('tiket.index');
// });
Route::get('/tiket', [TiketController::class, 'showSearchForm'])->name('tiket.form');
Route::get('/tiket/search', [TiketController::class, 'search'])->name('tiket.search');
Route::get('/tiketView', [TiketController::class, 'index'])->name('tiketView');
Route::get('/tiketDetail/{id_penerbangan}', [TiketController::class, 'showDetail'])->name('tiketDetail');

Route::get('/formPemesanan/{id_tiket}', [PemesananController::class, 'showForm'])->name('formPemesanan');
Route::post('/penumpang/store', [PemesananController::class, 'store'])->name('penumpang.store');

Route::get('/profile', function () {
    return view('profile');
});

// Route::resource('pemesanan', PemesananController::class);

// Route::get('/tiketView', function () {
//     return view('tiketView', [
//         'tiketList' => [
//             [
//             'maskapai' => "TransNusa",
//             'jamBerangkat' => "07:00",
//             'berangkat' => "CGK",
//             'durasi' => "1j 40m",
//             'tipe' => "langsung",
//             'jamTiba' => "08:40",
//             'tujuan' => "DPS",
//             'harga' => "890.000",
//             ],
//             [
//             'maskapai' => "Lion Air",
//             'jamBerangkat' => "08:00",
//             'berangkat' => "CGK",
//             'durasi' => "1j 45m",
//             'tipe' => "langsung",
//             'jamTiba' => "09:45",
//             'tujuan' => "DPS",
//             'harga' => "950.000",
//             ],
//             [
//             'maskapai' => "Citilink",
//             'jamBerangkat' => "06:00",
//             'berangkat' => "CGK",
//             'durasi' => "1j 50m",
//             'tipe' => "langsung",
//             'jamTiba' => "07:50",
//             'tujuan' => "DPS",
//             'harga' => "900.000",
//             ],
//         ]
//     ]);
// });

Route::get('/tiketDetail', function(){
    return view('tiketDetail');
});

// Route::get('/formPemesanan', function(){
//     return view('formPemesanan');
// });

Route::get('/pembayaran', function(){
    return view('pembayaran');
});

Route::get('/refund', function () {
    return view('refund');
});

Route::get('/e-ticket', function () {
    return view('e-ticket');
});


Route::get('/admin', function () {
    // Cek apakah user sudah login dan memiliki role admin
    if (!session()->has('user') || session('user.role') !== 'admin') {
        return redirect()->route('login')->with('error', 'Anda tidak memiliki akses');
    }
    return view('admin');
})->name('admin.dashboard');

Route::get('/kelola_tiket', function () {
    return view('kelola_tiket');
});

Route::get('/tambah_tiket', function () {
    return view('tambah_tiket');
});

Route::get('/kelola_pengguna', function () {
    return view('kelola_pengguna');
});

Route::get('/formRefund', function(){
    return view('formRefund');
});

Route::get('/rincianRefund', function(){
    return view('rincianRefund');
});