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
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari pengguna berdasarkan username
        $user = User::where('username', $validatedData['username'])->first();

        // Jika pengguna tidak ditemukan atau password salah
        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Buat token autentikasi
        $token = $user->createToken('auth_token')->plainTextToken;

        // Berikan response jika login berhasil
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,
        ]);
    }
    
    // Membuat User Baru (Register)
    public function register(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'password' => 'required|string',
            'username' => 'required|string|unique:users',
            'nama_user' => 'required|string',
            'alamat' => 'required|string',
            'email_user' => 'required|string|email|unique:users',
            'telp_user' => 'required|string|digits_between:11,13|unique:users',
            'foto' => 'nullable|string',
        ]);

        // Hash password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Buat user baru
        $user = User::create($validatedData);

        // Tidak perlu buat token disini

        // Redirect ke halaman login setelah berhasil mendaftar
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'redirect_to' => '/login',
        ]);
    }

    // Menampilkan Daftar User
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // public function show(){
    //     $user = Auth::user();

    //     if(!$user){
    //         return response()->json(['message' => 'Pengguna tidak ditemukan atau tidak terautentikasi'], 404);
    //     }
    //     return response()->json($user);
    // }

    //Menampilkan Detail User Berdasarkan ID
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

    public function showLoginPage()
    {
        return view('login'); // Ganti dengan nama view login Anda
    }
}