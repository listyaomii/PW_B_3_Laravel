<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Fungsi Login
    public function login(Request $request)
    {
        // Validasi data yang dikirimkan dalam request
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek kredensial (username dan password)
        if (Auth::attempt(['username' => $validatedData['username'], 'password' => $validatedData['password']])) {
            $user = Auth::user();

            // Mengembalikan response dengan token jika login berhasil
            $token = $user->createToken('YourAppName')->plainTextToken;

            return response()->json([
                'message' => 'Login berhasil.',
                'user' => $user,
                'token' => $token,
            ]);
        }

        // Jika login gagal
        return response()->json([
            'message' => 'Username atau password salah.',
        ], 401);
    }
    
    // Membuat User Baru (Register)
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|string',
            'username' => 'required|string|unique:users',
            'nama_user' => 'required|string',
            'alamat' => 'required|string',
            'email_user' => 'required|string|email|unique:users',
            'telp_user' => 'required|string|digits_between:11,13|unique:users',
            'foto' => 'nullable|string',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        return response()->json([
            'message' => 'User berhasil didaftarkan.',
            'user' => $user
        ], 201);
    }

    // Menampilkan Daftar User
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Menampilkan Detail User Berdasarkan ID
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan.'], 404);
        }

        return response()->json($user);
    }

    // Memperbarui Data User
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan.'], 404);
        }

        $validatedData = $request->validate([
            'password' => 'nullable|string',
            'username' => 'nullable|string|unique:users,username,' . $id . ',id_user',
            'nama_user' => 'nullable|string',
            'alamat' => 'nullable|string',
            'email_user' => 'nullable|string|email|unique:users,email_user,' . $id . ',id_user',
            'telp_user' => 'nullable|string|digits_between:11,13|unique:users,telp_user,' . $id . ',id_user',
            'foto' => 'nullable|string',
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($validatedData);

        return response()->json([
            'message' => 'User berhasil diperbarui.',
            'user' => $user
        ]);
    }

    // Menghapus User
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan.'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User berhasil dihapus.']);
    }
}
