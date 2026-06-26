<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PeminjamanNotification;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'ruangan', 'fasilitas'])->orderBy('created_at', 'desc')->get();
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    public function updateStatus(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'status' => 'required|in:Approved,Rejected'
        ]);

        $peminjaman->update([
            'status' => $request->status
        ]);

        Mail::to($peminjaman->user->email)->send(new PeminjamanNotification($peminjaman));

        return redirect()->route('admin.peminjaman.index')->with('success', 'Status peminjaman berhasil diubah dan email notifikasi telah dikirim.');
    }
}   