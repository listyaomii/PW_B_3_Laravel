<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Refund;
use App\Models\Penerbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    // Show the registration form for admin
    public function registerForm()
    {
        return view('admin.register');
    }

    // Register a new admin
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nama_admin' => 'required|string|max:255',
            'email_admin' => 'required|email|unique:admins,email_admin',
            'password_admin' => 'required|string|min:8',
        ]);

        $admin = Admin::create([
            'nama_admin' => $validatedData['nama_admin'],
            'email_admin' => $validatedData['email_admin'],
            'password_admin' => bcrypt($validatedData['password_admin']),
        ]);

        return redirect()->route('admin.loginForm')->with('message', 'Registration successful.');
    }

    // Show the login form for admin
    public function loginForm()
    {
        return view('admin.login');
    }

    // Handle login for admin
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email_admin' => 'required|string|email',
            'password_admin' => 'required|string',
        ]);

        $admin = Admin::where('email_admin', $validatedData['email_admin'])->first();

        if (!$admin || !Hash::check($validatedData['password_admin'], $admin->password_admin)) {
            return redirect()->back()->withErrors(['message' => 'Invalid email or password.']);
        }

        // Optionally, you can use session to store admin login
        session(['admin' => $admin]);

        return redirect()->route('admin.dashboard')->with('message', 'Login successful.');
    }

    // Display a listing of the admins
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    // Show the form for creating a new admin
    public function create()
    {
        return view('admin.create');
    }

    // Store a newly created admin in storage
    public function store(Request $request)
    {
        $request->validate([
            'nama_admin' => 'required|string|max:255',
            'email_admin' => 'required|email|unique:admins,email_admin',
            'password_admin' => 'required|string|min:8',
        ]);

        $admin = Admin::create([
            'nama_admin' => $request->nama_admin,
            'email_admin' => $request->email_admin,
            'password_admin' => bcrypt($request->password_admin),
        ]);

        return redirect()->route('admin.index')->with('message', 'Admin created successfully.');
    }

    // Display the specified admin
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.show', compact('admin'));
    }

    // Show the form for editing the specified admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    // Update the specified admin in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_admin' => 'required|string|max:255',
            'email_admin' => 'required|email|unique:admins,email_admin,' . $id,
            'password_admin' => 'nullable|string|min:8',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->nama_admin = $request->nama_admin;
        $admin->email_admin = $request->email_admin;

        if ($request->filled('password_admin')) {
            $admin->password_admin = bcrypt($request->password_admin);
        }

        $admin->save();

        return redirect()->route('admin.index')->with('message', 'Admin updated successfully.');
    }

    public function updateUser(Request $request, $id)
{
    \Log::info('Update User Request', [
        'id' => $id,
        'data' => $request->all()
    ]);

    try {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'nama_user' => 'required|string|max:255',
            'email_user' => 'required|email|unique:users,email_user,' . $id . ',id_user',
        ]);

        $user->update([
            'nama_user' => $validatedData['nama_user'],
            'email_user' => $validatedData['email_user']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User berhasil diupdate',
            'user' => $user
        ]);
    } catch (\Exception $e) {
        \Log::error('Update User Error', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Gagal mengupdate user: ' . $e->getMessage()
        ], 500);
    }
}

public function deleteUser($id)
{
    \Log::info('Delete User Request', ['id' => $id]);

    try {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User berhasil dihapus'
        ]);
    } catch (\Exception $e) {
        \Log::error('Delete User Error', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus user: ' . $e->getMessage()
        ], 500);
    }
}

    // Remove the specified admin from storage
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.index')->with('message', 'Admin deleted successfully.');
    }

    // Optionally show a dashboard page for the admin
    public function dashboard()
{
    // Ambil data dari database
    $totalUsers = User::count();
    $totalRefunds = Refund::count();
    $totalPenerbangan = Penerbangan::count();
    $users = User::all();

    // Ambil admin yang sedang login dari session
    $admin = session('admin');

    return view('admin', [
        'totalUsers' => $totalUsers,
        'totalRefunds' => $totalRefunds,
        'totalPenerbangan' => $totalPenerbangan,
        'users' => $users,
        'admin' => $admin
    ]);
}

}

