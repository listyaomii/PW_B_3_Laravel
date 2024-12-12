<?php

namespace App\Http\Controllers;

use App\Models\Penerbangan;
use Illuminate\Http\Request;

class PenerbanganController extends Controller
{
    // Menampilkan semua penerbangan
    public function index()
    {
        $penerbangans = Penerbangan::with('tiket', 'admin')->get();
        return response()->json($penerbangans);
    }

    // Menampilkan detail penerbangan berdasarkan ID
    public function show($id)
    {
        $penerbangan = Penerbangan::with('tiket', 'admin')->find($id);

        if (!$penerbangan) {
            return response()->json(['message' => 'Penerbangan tidak ditemukan.'], 404);
        }

        return response()->json($penerbangan);
    }

    // Membuat penerbangan baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bandara_asal' => 'required|string',
            'bandara_tujuan' => 'required|string',
            'tanggal' => 'required|date',
            'maskapai' => 'required|string',
            'waktu_keberangkatan' => 'required|date_format:H:i',
            'waktu_kedatangan' => 'required|date_format:H:i',
            'durasi' => 'required|string',
        ]);

        $penerbangan = Penerbangan::create($validatedData);

        return response()->json([
            'message' => 'Penerbangan berhasil ditambahkan.',
            'penerbangan' => $penerbangan
        ], 201);
    }

    // Memperbarui data penerbangan
    public function update(Request $request, $id)
    {
        $penerbangan = Penerbangan::find($id);

        if (!$penerbangan) {
            return response()->json(['message' => 'Penerbangan tidak ditemukan.'], 404);
        }

        $validatedData = $request->validate([
            'bandara_asal' => 'sometimes|string',
            'bandara_tujuan' => 'sometimes|string',
            'tanggal' => 'sometimes|date',
            'maskapai' => 'sometimes|string',
            'waktu_keberangkatan' => 'sometimes|date_format:H:i',
            'waktu_kedatangan' => 'sometimes|date_format:H:i',
            'durasi' => 'sometimes|string',
        ]);

        $penerbangan->update($validatedData);

        return response()->json([
            'message' => 'Penerbangan berhasil diperbarui.',
            'penerbangan' => $penerbangan
        ]);
    }

    // Menghapus penerbangan
    public function destroy($id)
    {
        $penerbangan = Penerbangan::find($id);

        if (!$penerbangan) {
            return response()->json(['message' => 'Penerbangan tidak ditemukan.'], 404);
        }

        $penerbangan->delete();

        return response()->json(['message' => 'Penerbangan berhasil dihapus.']);
    }
}