<?php

namespace App\Http\Controllers;

// Pastikan baris ini ada agar AuthController mengenali file Controller induk
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Laravel 12: Gunakan role_id sesuai model User Anda
            if (Auth::user()->role_id == 1) {
                return redirect()->intended('/admin/dashboard');
            }
            return redirect()->intended('/mahasiswa/dashboard');
        }

        return back()->with('error', 'Email atau Password salah.');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function processRegister(Request $request)
    {
        // Validasi Laravel 12
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:user,email', 
        'password' => 'required|min:8'
    ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => 2 // 1: Admin, 2: Mahasiswa
        ]);

        Auth::login($user);

        return redirect()->route('mahasiswa.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}