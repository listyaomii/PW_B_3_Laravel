<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    // Fungsi untuk menampilkan semua refund
    public function index()
    {
        $refunds = Refund::with('pemesanan', 'admin')->get();
        return response()->json($refunds);
    }

    // Fungsi untuk menampilkan satu refund berdasarkan ID
    public function show($id)
    {
        $refund = Refund::with('pemesanan', 'admin')->find($id);

        if (!$refund) {
            return response()->json(['message' => 'Refund tidak ditemukan'], 404);
        }

        return response()->json($refund);
    }

    // Fungsi untuk membuat refund baru
    public function store(Request $request)
    {
        $request->validate([
            'id_pemesanan' => 'required|exists:pemesanans,id_pemesanan',
            'Total_refund' => 'required|numeric|min:0',
            'no_rekening' => 'required|string',
        ]);

        $refund = Refund::create($request->all());

        return response()->json([
            'message' => 'Refund berhasil dibuat',
            'refund' => $refund,
        ], 201);
    }

    // Fungsi untuk memperbarui data refund
    public function update(Request $request, $id)
    {
        $refund = Refund::find($id);

        if (!$refund) {
            return response()->json(['message' => 'Refund tidak ditemukan'], 404);
        }

        $request->validate([
            'id_pemesanan' => 'sometimes|exists:pemesanans,id_pemesanan',
            'Total_refund' => 'sometimes|numeric|min:0',
            'no_rekening' => 'sometimes|string',
        ]);

        $refund->update($request->all());

        return response()->json([
            'message' => 'Refund berhasil diperbarui',
            'refund' => $refund,
        ]);
    }

    // Fungsi untuk menghapus refund
    public function destroy($id)
    {
        $refund = Refund::find($id);

        if (!$refund) {
            return response()->json(['message' => 'Refund tidak ditemukan'], 404);
        }

        $refund->delete();

        return response()->json(['message' => 'Refund berhasil dihapus']);
    }
}
