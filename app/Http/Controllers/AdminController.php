<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Penerbangan;
use App\Models\Refund;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Fungsi Login untuk Admin
    public function login(Request $request)
    {
        // Validasi data yang dikirimkan dalam request
        $validatedData = $request->validate([
            'email_admin' => 'required|string|email',
            'password_admin' => 'required|string',
        ]);

        // Cek kredensial (email dan password)
        $admin = Admin::where('email_admin', $validatedData['email_admin'])->first();

        if (!$admin || !Hash::check($validatedData['password_admin'], $admin->password_admin)) {
            return response()->json([
                'message' => 'Email atau password salah.',
            ], 401);
        }

        // Menghasilkan token jika login berhasil
        $token = $admin->createToken('AdminApp')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil.',
            'admin' => $admin,
            'token' => $token,
        ]);
    }
    // Display a listing of the admins
    public function index()
    {
        $admins = Admin::all();
        return response()->json($admins);
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

        return response()->json($admin, 201);
    }

    // Display the specified admin
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return response()->json($admin);
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

        return response()->json($admin);
    }

    // Remove the specified admin from storage
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->json(['message' => 'Admin deleted successfully']);
    }

    // Get all users for a specific admin
    public function users($id)
    {
        $admin = Admin::findOrFail($id);
        $users = $admin->users;
        return response()->json($users);
    }

    // Get all penerbangan for a specific admin
    public function penerbangan($id)
    {
        $admin = Admin::findOrFail($id);
        $penerbangan = $admin->penerbangan;
        return response()->json($penerbangan);
    }

    // Get all refunds through users for a specific admin
    public function refunds($id)
    {
        $admin = Admin::findOrFail($id);
        $refunds = $admin->refunds;
        return response()->json($refunds);
    }
}
