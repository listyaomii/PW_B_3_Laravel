<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Penerbangan;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function search(Request $request)
    {
        // Validasi input
        $request->validate([
            'from' => 'required|string',
            'to' => 'required|string',
            'class' => 'required|string',
            'date' => 'required|date',
        ]);
    
        // Ambil data dari form
        $from = $request->input('from');
        $to = $request->input('to');
        $class = $request->input('class');
        $date = $request->input('date');
    
        // Lakukan pencarian tiket berdasarkan filter
        $tikets = Tiket::whereHas('penerbangan', function ($query) use ($from, $to, $date) {
            $query->where('bandara_asal', $from)
                  ->where('bandara_tujuan', $to)
                  ->whereDate('tanggal', $date);
        })
        ->where('kelas', $class)
        ->get();
    
        // Jika tidak ada tiket ditemukan
        if ($tikets->isEmpty()) {
            return view('tiket', [
                'tikets' => Tiket::with('penerbangan')->get(), // Tetap kirimkan semua tiket untuk dropdown
                'message' => 'Tidak ada tiket yang ditemukan.'
            ]);
        }
    
        // Kirim data tiket ke view
        return view('tiket', ['tikets' => $tikets]);
    }

    public function showSearchForm()
    {
        $bandaraAsal = Tiket::with('penerbangan')->get()->pluck('penerbangan.bandara_asal')->unique();
        $bandaraTujuan = Tiket::with('penerbangan')->get()->pluck('penerbangan.bandara_tujuan')->unique();
        $kelas = Tiket::select('kelas')->distinct()->pluck('kelas');

        return view('tiket', compact('bandaraAsal', 'bandaraTujuan', 'kelas'));
    }

    

    public function index()
    {
        $tiketList = Tiket::all(); // Ambil semua tiket atau data sesuai kebutuhan
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