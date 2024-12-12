<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    // Menampilkan semua penumpang
    public function index()
    {
        $penumpangs = Penumpang::all();
        return response()->json($penumpangs);
    }

    // Menampilkan detail penumpang berdasarkan ID
    public function show($id)
    {
        $penumpang = Penumpang::find($id);

        if (!$penumpang) {
            return response()->json(['message' => 'Penumpang tidak ditemukan.'], 404);
        }

        return response()->json($penumpang);
    }

    // Membuat penumpang baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'bandara_tujuan' => 'required|string',
            'title_penumpang' => 'required|string',
            'no_identitas' => 'required|string|unique:penumpangs',
            'no_telp' => 'required|string|digits_between:10,13',
            'tgl_lahir' => 'required|date',
            'kewarganegaraan' => 'required|string',
        ]);

        $penumpang = Penumpang::create($validatedData);

        return response()->json([
            'message' => 'Penumpang berhasil ditambahkan.',
            'penumpang' => $penumpang
        ], 201);
    }

    // Memperbarui data penumpang
    public function update(Request $request, $id)
    {
        $penumpang = Penumpang::find($id);

        if (!$penumpang) {
            return response()->json(['message' => 'Penumpang tidak ditemukan.'], 404);
        }

        $validatedData = $request->validate([
            'nama_lengkap' => 'sometimes|string',
            'bandara_tujuan' => 'sometimes|string',
            'title_penumpang' => 'sometimes|string',
            'no_identitas' => 'sometimes|string|unique:penumpangs,no_identitas,' . $id . ',id_penumpang',
            'no_telp' => 'sometimes|string|digits_between:10,13',
            'tgl_lahir' => 'sometimes|date',
            'kewarganegaraan' => 'sometimes|string',
        ]);

        $penumpang->update($validatedData);

        return response()->json([
            'message' => 'Penumpang berhasil diperbarui.',
            'penumpang' => $penumpang
        ]);
    }

    // Menghapus penumpang
    public function destroy($id)
    {
        $penumpang = Penumpang::find($id);

        if (!$penumpang) {
            return response()->json(['message' => 'Penumpang tidak ditemukan.'], 404);
        }

        $penumpang->delete();

        return response()->json(['message' => 'Penumpang berhasil dihapus.']);
    }
}