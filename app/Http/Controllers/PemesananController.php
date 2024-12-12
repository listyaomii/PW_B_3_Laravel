<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // Menampilkan semua data pemesanan
    public function index()
    {
        $pemesanans = Pemesanan::with(['tiket', 'penumpang', 'refund', 'pembayaran'])->get();
        return response()->json($pemesanans);
    }

    // Menampilkan detail pemesanan berdasarkan ID
    public function show($id)
    {
        $pemesanan = Pemesanan::with(['tiket', 'penumpang', 'refund', 'pembayaran'])->find($id);

        if (!$pemesanan) {
            return response()->json(['message' => 'Pemesanan tidak ditemukan.'], 404);
        }

        return response()->json($pemesanan);
    }

    // Membuat pemesanan baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_tiket' => 'required|exists:tikets,tiket_id',
            'id_penumpang' => 'required|exists:penumpangs,id_penumpang',
            'tanggal_pemesanan' => 'required|date',
        ]);

        $pemesanan = Pemesanan::create($validatedData);

        return response()->json([
            'message' => 'Pemesanan berhasil ditambahkan.',
            'pemesanan' => $pemesanan
        ], 201);
    }

    // Memperbarui data pemesanan
    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::find($id);

        if (!$pemesanan) {
            return response()->json(['message' => 'Pemesanan tidak ditemukan.'], 404);
        }

        $validatedData = $request->validate([
            'id_tiket' => 'sometimes|exists:tikets,tiket_id',
            'id_penumpang' => 'sometimes|exists:penumpangs,id_penumpang',
            'tanggal_pemesanan' => 'sometimes|date',
        ]);

        $pemesanan->update($validatedData);

        return response()->json([
            'message' => 'Pemesanan berhasil diperbarui.',
            'pemesanan' => $pemesanan
        ]);
    }

    // Menghapus data pemesanan
    public function destroy($id)
    {
        $pemesanan = Pemesanan::find($id);

        if (!$pemesanan) {
            return response()->json(['message' => 'Pemesanan tidak ditemukan.'], 404);
        }

        $pemesanan->delete();

        return response()->json(['message' => 'Pemesanan berhasil dihapus.']);
    }
}