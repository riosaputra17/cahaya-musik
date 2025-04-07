<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Show Register Form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Register
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            // 'role' => 'required|in:admin,user', // sesuaikan daftar role
        ]);

        $user = User::create([
            'user_id' => Str::uuid(),
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
            'created_at' => now(),
        ]);

        Auth::login($user);

        return redirect()->route('home'); // atau arahkan berdasarkan role
    }

    // Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['username' => 'Login gagal. Periksa kembali data Anda.']);
        }

        Auth::login($user);

        session()->put('user', [
            'name' => $user->username,
            'role' => $user->role,
        ]);

        if ($user->role === 'admin') {
            return redirect()->route('admin-dashboard');
        }

        return redirect()->route('home');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        session()->forget('user');
        return redirect()->route('login.form');
    }
}