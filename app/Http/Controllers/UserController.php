<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Halaman login
    public function loginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $validatedData['username'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
        }

        // Simpan sesi pengguna
        session(['user' => $user]);

           // Redirect to the home page after successful login
        return redirect()->route('home')->with('message', 'Login successful');
    }

    public function registerForm()
    {
        return view('register'); 
    }

    // Proses registrasi
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

        User::create($validatedData);

        return redirect()->route('users.loginForm')->with('message', 'User berhasil didaftarkan.');
    }

    // Menampilkan daftar user
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Menampilkan detail user
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->withErrors(['message' => 'User tidak ditemukan.']);
        }

        return view('users.show', compact('user'));
    }

    // Halaman edit user
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->withErrors(['message' => 'User tidak ditemukan.']);
        }

        return view('users.edit', compact('user'));
    }

    // Proses update user
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->withErrors(['message' => 'User tidak ditemukan.']);
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

        return redirect()->route('users.index')->with('message', 'User berhasil diperbarui.');
    }

    // Menghapus user
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->withErrors(['message' => 'User tidak ditemukan.']);
        }

        $user->delete();

        return redirect()->route('users.index')->with('message', 'User berhasil dihapus.');
    }
}
