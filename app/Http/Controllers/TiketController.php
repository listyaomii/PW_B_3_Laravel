<?php

namespace App\Http\Controllers;

use App\Models\Penerbangan; // Tambahkan namespace model
use App\Models\Tiket; // Tambahkan jika Tiket juga digunakan
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function search(Request $request)
    {
        // Ambil input pencarian dari form
        $bandaraAsal = $request->input('bandara_asal');
        $bandaraTujuan = $request->input('bandara_tujuan');
        $kelas = $request->input('kelas');
    
        // Periksa apakah input pencarian kosong
        if (is_null($bandaraAsal) && is_null($bandaraTujuan) && is_null($kelas)) {
            return redirect()->route('tiket.form')->with('error', 'Silakan pilih bandara asal, tujuan, dan kelas.');
        }
    
        // Simpan input pencarian dalam session
        $request->session()->put('bandara_asal', $bandaraAsal);
        $request->session()->put('bandara_tujuan', $bandaraTujuan);
        $request->session()->put('kelas', $kelas);
    
        // Query tiket dengan eager load untuk relasi penerbangan
        $tiket = Tiket::with('penerbangan');
    
        // Filter berdasarkan input pencarian
        if ($bandaraAsal) {
            $tiket = $tiket->whereHas('penerbangan', function ($query) use ($bandaraAsal) {
                $query->where('bandara_asal', $bandaraAsal);
            });
        }
    
        if ($bandaraTujuan) {
            $tiket = $tiket->whereHas('penerbangan', function ($query) use ($bandaraTujuan) {
                $query->where('bandara_tujuan', $bandaraTujuan);
            });
        }
    
        if ($kelas) {
            $tiket = $tiket->where('kelas', $kelas);
        }
    
        // Ambil data tiket
        $tiket = $tiket->get();
    
        // Ambil data bandara asal, tujuan, dan kelas untuk ditampilkan di form
        $bandaraAsalList = Penerbangan::distinct()->pluck('bandara_asal');
        $bandaraTujuanList = Penerbangan::distinct()->pluck('bandara_tujuan');
        $kelasList = Tiket::select('kelas')->distinct()->pluck('kelas');
    
        // Mengirimkan data ke view
        return view('tiketView', compact('tiket', 'bandaraAsalList', 'bandaraTujuanList', 'kelasList'));
    }
    
    

    public function showSearchForm()
    {
        // Ambil daftar bandara asal dan tujuan dari tabel penerbangan
        $bandaraAsalList = Penerbangan::select('bandara_asal')->distinct()->pluck('bandara_asal');
        $bandaraTujuanList = Penerbangan::select('bandara_tujuan')->distinct()->pluck('bandara_tujuan');
        $kelasList = ['Ekonomi', 'Bisnis'];
    
        // Kirim data ke view
        return view('tiket', compact('bandaraAsalList', 'bandaraTujuanList', 'kelasList'));
    }
    
    public function index(Request $request)
    {
        // Contoh filter pencarian tiket berdasarkan asal dan tujuan
        $query = Tiket::with('penerbangan'); // Eager load the 'penerbangan' relationship
        
        // Menambahkan kondisi filter jika ada
        if ($request->has('asal')) {
            $query->whereHas('penerbangan', function($query) use ($request) {
                $query->where('bandara_asal', $request->input('asal'));
            });
        }
        if ($request->has('tujuan')) {
            $query->whereHas('penerbangan', function($query) use ($request) {
                $query->where('bandara_tujuan', $request->input('tujuan'));
            });
        }
        if ($request->has('tanggal')) {
            $query->whereDate('waktu_keberangkatan', $request->input('tanggal'));
        }
    
        $tiketList = $query->get(); // Fetch the data with the 'penerbangan' relationship loaded
        
        return view('tiketView', compact('tiketList'));
    }
    
    

    public function create()
    {
        // Get all penerbangan data to show in the create form
        $penerbangans = Penerbangan::all();
        return view('tikets.create', compact('penerbangans'));
    }

    public function store(Request $request)
    {
        // Validate and create the tiket
        $validatedData = $request->validate([
            'kelas' => 'required|string',
            'harga' => 'required|numeric',
            'id_penerbangan' => 'required|exists:penerbangans,id_penerbangan',
        ]);

        $tiket = Tiket::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('tikets.index')->with('success', 'Tiket created successfully');
    }

    public function show($id)
    {
        // Fetch tiket with its penerbangan and show in a view
        $tiket = Tiket::with('penerbangan')->find($id);
        if (!$tiket) {
            return redirect()->route('tikets.index')->with('error', 'Tiket not found');
        }

        return view('tikets.show', compact('tiket'));
    }

    public function edit($id)
    {
        // Fetch tiket for editing and get available penerbangan
        $tiket = Tiket::find($id);
        $penerbangans = Penerbangan::all();
        if (!$tiket) {
            return redirect()->route('tikets.index')->with('error', 'Tiket not found');
        }

        return view('tikets.edit', compact('tiket', 'penerbangans'));
    }

    public function update(Request $request, $id)
    {
        // Fetch tiket and validate input
        $tiket = Tiket::find($id);
        if (!$tiket) {
            return redirect()->route('tikets.index')->with('error', 'Tiket not found');
        }

        $validatedData = $request->validate([
            'kelas' => 'sometimes|string',
            'harga' => 'sometimes|numeric',
            'id_penerbangan' => 'sometimes|exists:penerbangans,id_penerbangan',
        ]);

        $tiket->update($validatedData);

        // Redirect with success message
        return redirect()->route('tikets.index')->with('success', 'Tiket updated successfully');
    }

    public function destroy($id)
    {
        // Fetch tiket and delete
        $tiket = Tiket::find($id);
        if (!$tiket) {
            return redirect()->route('tikets.index')->with('error', 'Tiket not found');
        }

        $tiket->delete();

        // Redirect back with success message
        return redirect()->route('tikets.index')->with('success', 'Tiket deleted successfully');
    }
}