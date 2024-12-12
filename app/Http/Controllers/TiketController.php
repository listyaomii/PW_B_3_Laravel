<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{

    public function index()
    {
        $tikets = Tiket::with('penerbangan')->get();
        return response()->json($tikets);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelas' => 'required|string',
            'harga' => 'required|numeric',
            'id_penerbangan' => 'required|exists:penerbangans,id_penerbangan',
        ]);

        $tiket = Tiket::create($validatedData);

        return response()->json(["message" => "Tiket created successfully", "data" => $tiket], 201);
    }


    public function show($id)
    {
        $tiket = Tiket::with('penerbangan')->find($id);
        if (!$tiket) {
            return response()->json(["message" => "Tiket not found"], 404);
        }

        return response()->json($tiket);
    }


    public function update(Request $request, $id)
    {
        $tiket = Tiket::find($id);
        if (!$tiket) {
            return response()->json(["message" => "Tiket not found"], 404);
        }

        $validatedData = $request->validate([
            'kelas' => 'sometimes|string',
            'harga' => 'sometimes|numeric',
            'id_penerbangan' => 'sometimes|exists:penerbangans,id_penerbangan',
        ]);

        $tiket->update($validatedData);

        return response()->json(["message" => "Tiket updated successfully", "data" => $tiket]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiket = Tiket::find($id);
        if (!$tiket) {
            return response()->json(["message" => "Tiket not found"], 404);
        }

        $tiket->delete();

        return response()->json(["message" => "Tiket deleted successfully"]);
    }
}
