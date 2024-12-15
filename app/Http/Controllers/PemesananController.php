<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Penumpang;

class PemesananController extends Controller
{
    public function showForm($id_tiket)
    {
        $tiket = Tiket::findOrFail($id_tiket);
        return view('formPemesanan', compact('tiket'));
    }
    
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

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_lengkap' => 'required|string',
            'title_penumpang' => 'required|string',
            'no_identitas' => 'required|string|unique:penumpangs',
            'no_telp' => 'required|string|digits_between:10,13',
            'tgl_lahir' => 'required|date',
            'kewarganegaraan' => 'required|string',
        ]);
    
    
        // Menyimpan data ke database
        Penumpang::create([
            'title_penumpang' => $request->input('title_penumpang'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'no_identitas' => $request->input('no_identitas'),
            'no_telp' => $request->input('no_telp'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'kewarganegaraan' => $request->input('kewarganegaraan'),
        ]);
    
        // Redirect setelah data disimpan
        return redirect()->route('pembayaran');
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