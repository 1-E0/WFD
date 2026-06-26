<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PeminjamanController as AdminPeminjamanController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Mahasiswa\PeminjamanController as MahasiswaPeminjamanController;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $ruangans = Ruangan::take(3)->get();
    return view('welcome', compact('ruangans'));
})->name('landing');

// Rute darurat untuk force logout jika sesi menyangkut
Route::get('/debug-logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:1')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        
        Route::resource('peminjaman', AdminPeminjamanController::class);
        Route::resource('ruangan', RuanganController::class);
        Route::resource('fasilitas', FasilitasController::class);
    });

    Route::middleware('role:2')->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
        Route::get('/dashboard', function () {
            return view('mahasiswa.dashboard');
        })->name('dashboard');
        
        Route::resource('peminjaman', MahasiswaPeminjamanController::class);
    });
});