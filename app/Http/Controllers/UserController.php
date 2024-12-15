<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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

    // Cek login untuk user biasa
    $user = User::where('username', $request->username)->first();

    // Cek login untuk admin 
    $admin = Admin::where('email_admin', $request->username)->first();

    // Pengecekan untuk user
    if ($user && Hash::check($request->password, $user->password)) {
        session(['user' => [
            'id_user' => $user->id_user,
            'nama_user' => $user->nama_user,
            'username' => $user->username,
            'email_user' => $user->email_user,
            'alamat' => $user->alamat,
            'telp_user' => $user->telp_user,
            'role' => 'user'
        ]]);
        return redirect('/home');
    }

    // Pengecekan untuk admin
    if ($admin && Hash::check($request->password, $admin->password_admin)) {
        session(['user' => [
            'id_admin' => $admin->id_admin,
            'nama_admin' => $admin->nama_admin,
            'email_admin' => $admin->email_admin,
            'role' => 'admin'
        ]]);
        return redirect('/admin');
    }

    return back()->withErrors(['username' => 'Kredensial tidak valid.']);
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
    ]);

    $validatedData['password'] = Hash::make($validatedData['password']);
    
    // Set default foto path
    $validatedData['foto'] = 'profile_pictures/jay.jpeg';

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

    public function logout(){
    session()->forget('user');
    return redirect()->route('login');
}

public function deleteAccount()
{
    $userId = Session::get('user.id_user');
    
    if ($userId) {
        $user = User::find($userId);
        
        if ($user) {
            // Hapus foto profil jika bukan default
            if ($user->foto && $user->foto !== 'profile_pictures/jay.jpeg') {
                Storage::disk('public')->delete($user->foto);
            }
            
            // Hapus user
            $user->delete();
            
            // Logout
            Session::forget('user');
            
            return redirect()->route('login')->with('success', 'Akun berhasil dihapus');
        }
    }
    
    return redirect()->route('login')->with('error', 'Gagal menghapus akun');
}

    //INI YANG BARU
    public function update(Request $request)
{
    if(Session::has('user.id_user')){
        $user = User::find(Session::get('user.id_user'));
        $validator = Validator::make($request->all(), [
            'nama_user' => 'required|string|max:255',
            'email_user' => 'required|email|unique:users,email_user,' . $user->id_user . ',id_user',
            'telp_user' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fotoPath = $user->foto;

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Jika foto saat ini bukan default 'jay.jpeg', hapus foto lama
            if ($fotoPath !== 'profile_pictures/jay.jpeg' && Storage::disk('public')->exists($fotoPath)) {
                Storage::disk('public')->delete($fotoPath);
            }

            // Unggah foto baru
            $foto = $request->file('foto');
            $fotoPath = $foto->store('profile_pictures', 'public');
        }

        // Update data user
        $user->update([
            'nama_user' => $request->nama_user,
            'email_user' => $request->email_user,
            'telp_user' => $request->telp_user,
            'alamat' => $request->alamat,
            'foto' => $fotoPath,
        ]);

        // Update session
        $updatedSession = Session::get('user');
        $updatedSession['nama_user'] = $request->nama_user;
        $updatedSession['email_user'] = $request->email_user;
        $updatedSession['telp_user'] = $request->telp_user;
        $updatedSession['alamat'] = $request->alamat;
        $updatedSession['foto'] = $fotoPath;
        Session::put('user', $updatedSession);

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui');
    } else {
        return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
    }
}

    public function showProfile()
{
    // Ambil ID user dari session
    $userId = Session::get('user.id_user');

    // Jika tidak ada user ID di session, redirect ke login
    if (!$userId) {
        return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
    }

    // Cari user berdasarkan ID
    $user = User::find($userId);

    // Jika user tidak ditemukan
    if (!$user) {
        return redirect()->route('login')->with('error', 'User tidak ditemukan');
    }

    // Tentukan URL foto
    $fotoUrl = $user->foto 
        ? Storage::url($user->foto) 
        : asset('imgs/jay.jpeg');

    // Kirim data ke view
    return view('profile', compact('user', 'fotoUrl'));
}

}