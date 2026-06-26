<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\PeminjamanController as AdminPeminjamanController;
use App\Http\Controllers\Mahasiswa\PeminjamanController;
use App\Models\Ruangan;

Route::get('/', function () {
    $ruangans = Ruangan::take(3)->get();
    return view('welcome', compact('ruangans'));
})->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'processRegister']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('ruangan', RuanganController::class)->except(['show', 'edit', 'update']);
    Route::resource('fasilitas', FasilitasController::class)->except(['show', 'edit', 'update']);
    
    Route::get('/peminjaman', [AdminPeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::put('/peminjaman/{peminjaman}/status', [AdminPeminjamanController::class, 'updateStatus'])->name('peminjaman.updateStatus');
});

Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [PeminjamanController::class, 'index'])->name('dashboard');
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
});