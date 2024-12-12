<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Menampilkan semua data pembayaran
    public function index()
    {
        $pembayarans = Pembayaran::with('pemesanan')->get();
        return response()->json($pembayarans);
    }

    // Menampilkan detail pembayaran berdasarkan ID
    public function show($id)
    {
        $pembayaran = Pembayaran::with('pemesanan')->find($id);

        if (!$pembayaran) {
            return response()->json(['message' => 'Pembayaran tidak ditemukan.'], 404);
        }

        return response()->json($pembayaran);
    }

    // Membuat pembayaran baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pemesanan' => 'required|exists:pemesanans,id_pemesanan',
        ]);

        $pembayaran = Pembayaran::create($validatedData);

        return response()->json([
            'message' => 'Pembayaran berhasil ditambahkan.',
            'pembayaran' => $pembayaran
        ], 201);
    }

    // Memperbarui data pembayaran
    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::find($id);

        if (!$pembayaran) {
            return response()->json(['message' => 'Pembayaran tidak ditemukan.'], 404);
        }

        $validatedData = $request->validate([
            'id_pemesanan' => 'sometimes|exists:pemesanans,id_pemesanan',
        ]);

        $pembayaran->update($validatedData);

        return response()->json([
            'message' => 'Pembayaran berhasil diperbarui.',
            'pembayaran' => $pembayaran
        ]);
    }

    // Menghapus data pembayaran
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);

        if (!$pembayaran) {
            return response()->json(['message' => 'Pembayaran tidak ditemukan.'], 404);
        }

        $pembayaran->delete();

        return response()->json(['message' => 'Pembayaran berhasil dihapus.']);
    }
}
