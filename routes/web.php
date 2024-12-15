<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TiketController;
use App\Models\User;
use App\Models\Refund;
use App\Models\Penerbangan;


Route::get('/home', function () {
    if (!session()->has('user') || session('user.role') !== 'user') {
        return redirect()->route('login')->with('error', 'Anda tidak memiliki akses');
    }
    return view('home');
})->name('home');

Route::get('/admin', function () {
    // Cek apakah user adalah admin
    if (!session()->has('user') || session('user.role') !== 'admin') {
        return redirect()->route('login')->with('error', 'Anda tidak memiliki akses');
    }

    // Ambil data dari database
    $totalUsers = User::count();
    $totalRefunds = Refund::count();
    $totalPenerbangan = Penerbangan::count();
    $users = User::all();

    return view('admin', [
        'totalUsers' => $totalUsers,
        'totalRefunds' => $totalRefunds,
        'totalPenerbangan' => $totalPenerbangan,
        'users' => $users
    ]);
})->name('admin.dashboard');

Route::get('/login', [UserController::class, 'loginForm'])->name('login');

Route::get('/', function () {
    return view('Login');
})->name('login'); // Optional if you want the homepage to also use the login page

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Define the register route
Route::resource('/user', UserController::class);
Route::get('/register', [UserController::class, 'registerForm'])->name('user.register');
Route::post('/login', [UserController::class, 'login'])->name('user.login');  // Corrected route
Route::post('/register', [UserController::class, 'register'])->name('user.register.post');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::post('/profile/update', [UserController::class, 'update'])->name('user.update');
Route::delete('/profile/delete', [UserController::class, 'deleteAccount'])
    ->name('user.delete');
    
Route::get('/pesanan', function () {
    return view('pesanan');
});

Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

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
