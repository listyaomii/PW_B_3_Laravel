<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    // Menampilkan semua penumpang
    public function index()
    {
        $penumpangs = Penumpang::all(); // Ambil semua data penumpang
        return view('penumpang.index', compact('penumpangs')); // Menampilkan view dengan data penumpang
    }

    // Menampilkan detail penumpang berdasarkan ID
    public function show($id)
    {
        $penumpang = Penumpang::find($id);

        if (!$penumpang) {
            return redirect()->route('penumpang.index')->with('error', 'Penumpang tidak ditemukan.');
        }

        return view('penumpang.show', compact('penumpang')); // Menampilkan detail penumpang
    }

    // Membuat penumpang baru
    public function create()
    {
        return view('penumpang.create'); // Menampilkan form untuk menambah penumpang
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'title_penumpang' => 'required|string',
            'no_identitas' => 'required|string|unique:penumpangs',
            'no_telp' => 'required|string|digits_between:10,13',
            'tgl_lahir' => 'required|date',
            'kewarganegaraan' => 'required|string',
        ]);

        // Membuat penumpang baru
        Penumpang::create($validatedData);

        return redirect()->route('pembayaran')->with('success', 'Penumpang berhasil ditambahkan.');
    }

    // Memperbarui data penumpang
    public function edit($id)
    {
        $penumpang = Penumpang::find($id);

        if (!$penumpang) {
            return redirect()->route('penumpang.index')->with('error', 'Penumpang tidak ditemukan.');
        }

        return view('penumpang.edit', compact('penumpang')); // Menampilkan form untuk edit data penumpang
    }

    public function update(Request $request, $id)
    {
        $penumpang = Penumpang::find($id);

        if (!$penumpang) {
            return redirect()->route('penumpang.index')->with('error', 'Penumpang tidak ditemukan.');
        }

        // Validasi data
        $validatedData = $request->validate([
            'nama_lengkap' => 'sometimes|string',
            'title_penumpang' => 'sometimes|string',
            'no_identitas' => 'sometimes|string|unique:penumpangs,no_identitas,' . $id . ',id_penumpang',
            'no_telp' => 'sometimes|string|digits_between:10,13',
            'tgl_lahir' => 'sometimes|date',
            'kewarganegaraan' => 'sometimes|string',
        ]);

        // Update data penumpang
        $penumpang->update($validatedData);

        return redirect()->route('penumpang.index')->with('success', 'Penumpang berhasil diperbarui.');
    }

    // Menghapus penumpang
    public function destroy($id)
    {
        $penumpang = Penumpang::find($id);

        if (!$penumpang) {
            return redirect()->route('penumpang.index')->with('error', 'Penumpang tidak ditemukan.');
        }

        // Hapus penumpang
        $penumpang->delete();

        return redirect()->route('penumpang.index')->with('success', 'Penumpang berhasil dihapus.');
    }
}
