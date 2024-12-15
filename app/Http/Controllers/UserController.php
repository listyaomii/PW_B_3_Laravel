<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
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
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek login admin terlebih dahulu
        $admin = Admin::where('nama_admin', $request->username)->first();
        if ($admin && Hash::check($request->password, $admin->password_admin)) {
            session(['user' => [
                'id' => $admin->id_admin,
                'nama' => $admin->nama_admin,
                'email' => $admin->email_admin,
                'role' => 'admin'
            ]]);
            return redirect('/admin');
        }

        // Cek login user
        $user = User::where('username', $request->username)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => [
                'id' => $user->id_user,
                'nama' => $user->nama_user,
                'email' => $user->email_user,
                'role' => 'user'
            ]]);
            return redirect('/home');
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
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

        return redirect()->route('login')->with('message', 'Registrasi berhasil! Silakan login.');
    }

    // Menampilkan daftar user
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    // Menampilkan detail user
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.index')->withErrors(['message' => 'User tidak ditemukan.']);
        }

        return view('user.show', compact('user'));
    }

    // Halaman edit user
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.index')->withErrors(['message' => 'User tidak ditemukan.']);
        }

        return view('user.edit', compact('user'));
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

    public function showProfile()
    {
        // Ambil user dari sesi
        if(session()->has('id_user')){
            $user = User::find(session('id_user'));

            if($user){
                return view('profile', compact('user'));
            }else{
                return redirect()->route('login')->with('error', 'User tidak ditemukan');
            }
        }else{
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }
    }

    public function logout(){
        session()->foreget(['id_user', 'nama_user']);
        return redirect()->route('login');
    }

}
