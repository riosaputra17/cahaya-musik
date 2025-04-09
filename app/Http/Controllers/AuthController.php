<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:20|unique:customers',
            'address' => 'required|string|max:500',
        ]);

        DB::beginTransaction();

        try {
            $idUser = Str::uuid()->toString();
            User::create([
                'user_id' => $idUser,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'user',
            ]);

            Customer::create([
                'customer_id' => Str::uuid(),
                'user_id' => $idUser,
                'nama' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'alamat' => $request->address,
            ]);

            DB::commit();

            return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Registrasi gagal: ' . $e->getMessage()]);
        }
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
            return back()->withErrors(['login' => 'Login gagal. Periksa kembali data Anda.']);
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