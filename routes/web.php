<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/home', function () {
    return view('home');
})->name('home'); 

Route::get('/login', [UserController::class, 'loginForm'])->name('user.loginForm'); // Corrected route

Route::get('/', function () {
    return view('Login');
})->name('login'); // Optional if you want the homepage to also use the login page

// Define the register route
Route::get('/register', [UserController::class, 'registerForm'])->name('user.register');

Route::post('/login', [UserController::class, 'login'])->name('user.login');  // Corrected route
Route::post('/register', [UserController::class, 'register'])->name('user.register.post');

Route::get('/pesanan', function () {
    return view('pesanan');
});

Route::get('/tiket', function () {
    return view('tiket');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/tiketView', function () {
    return view('tiketView', [
        'tiketList' => [
            [
            'maskapai' => "TransNusa",
            'jamBerangkat' => "07:00",
            'berangkat' => "CGK",
            'durasi' => "1j 40m",
            'tipe' => "langsung",
            'jamTiba' => "08:40",
            'tujuan' => "DPS",
            'harga' => "890.000",
            ],
            [
            'maskapai' => "Lion Air",
            'jamBerangkat' => "08:00",
            'berangkat' => "CGK",
            'durasi' => "1j 45m",
            'tipe' => "langsung",
            'jamTiba' => "09:45",
            'tujuan' => "DPS",
            'harga' => "950.000",
            ],
            [
            'maskapai' => "Citilink",
            'jamBerangkat' => "06:00",
            'berangkat' => "CGK",
            'durasi' => "1j 50m",
            'tipe' => "langsung",
            'jamTiba' => "07:50",
            'tujuan' => "DPS",
            'harga' => "900.000",
            ],
        ]
    ]);
});

Route::get('/tiketDetail', function(){
    return view('tiketDetail');
});

Route::get('/formPemesanan', function(){
    return view('formPemesanan');
});

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
    return view('admin');
});

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
