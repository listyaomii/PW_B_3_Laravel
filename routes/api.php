<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenerbanganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\TiketController;

// Rute untuk login admin
Route::post('/admin/login', [AdminController::class, 'login']);

// Rute untuk register admin
Route::post('/admin/register', [AdminController::class, 'register']);

// Rute untuk login user
Route::post('/user/login', [UserController::class, 'login']);

// Rute untuk registrasi user
Route::post('/user/register', [UserController::class, 'register']);

// Rute yang dilindungi dengan autentikasi Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // User Routes
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);

    // Menampilkan informasi user yang terautentikasi
    Route::get('/user/me', function (Request $request) {
        return $request->user();
    });

    // Pembayaran Routes
    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/{id}', [PembayaranController::class, 'show']);
    Route::post('/pembayaran', [PembayaranController::class, 'store']);
    Route::put('/pembayaran/{id}', [PembayaranController::class, 'update']);
    Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy']);

    // Pemesanan Routes
    Route::get('/pemesanan', [PemesananController::class, 'index']);
    Route::get('/pemesanan/{id}', [PemesananController::class, 'show']);
    Route::post('/pemesanan', [PemesananController::class, 'store']);
    Route::put('/pemesanan/{id}', [PemesananController::class, 'update']);
    Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy']);

    // Penerbangan Routes - Untuk Semua (Read Only)
    Route::get('/penerbangan', [PenerbanganController::class, 'index']);
    Route::get('/penerbangan/{id}', [PenerbanganController::class, 'show']);

    // Penumpang Routes
    Route::get('/penumpang', [PenumpangController::class, 'index']);
    Route::get('/penumpang/{id}', [PenumpangController::class, 'show']);
    Route::post('/penumpang', [PenumpangController::class, 'store']);
    Route::put('/penumpang/{id}', [PenumpangController::class, 'update']);
    Route::delete('/penumpang/{id}', [PenumpangController::class, 'destroy']);

    // Refund Routes
    Route::get('/refund', [RefundController::class, 'index']);
    Route::get('/refund/{id}', [RefundController::class, 'show']);
    Route::post('/refund', [RefundController::class, 'store']);
    Route::put('/refund/{id}', [RefundController::class, 'update']);
    Route::delete('/refund/{id}', [RefundController::class, 'destroy']);

    // Tiket Routes
    Route::get('/tiket', [TiketController::class, 'index']);
    Route::get('/tiket/{id}', [TiketController::class, 'show']);
    Route::post('/tiket', [TiketController::class, 'store']);
    Route::put('/tiket/{id}', [TiketController::class, 'update']);
    Route::delete('/tiket/{id}', [TiketController::class, 'destroy']);
});

// Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/admin', [AdminController::class, 'store']);
    Route::get('/admin/{id}', [AdminController::class, 'show']);
    Route::put('/admin/{id}', [AdminController::class, 'update']);
    Route::delete('/admin/{id}', [AdminController::class, 'destroy']);
    Route::get('/admin/{id}/users', [AdminController::class, 'users']);
    Route::get('/admin/{id}/penerbangan', [AdminController::class, 'penerbangan']);
    Route::get('/admin/{id}/refunds', [AdminController::class, 'refunds']);

    // Penerbangan Routes - Khusus Admin
    Route::post('/penerbangan', [PenerbanganController::class, 'store']);
    Route::put('/penerbangan/{id}', [PenerbanganController::class, 'update']);
    Route::delete('/penerbangan/{id}', [PenerbanganController::class, 'destroy']);
// });
