<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use App\Models\Fasilitas;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('mahasiswa.dashboard', compact('peminjaman'));
    }

    public function create()
    {
        $ruangan = Ruangan::all();
        $fasilitas = Fasilitas::where('stok_tersedia', '>', 0)->get();
        return view('mahasiswa.peminjaman.create', compact('ruangan', 'fasilitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ruangan_id' => 'required|exists:ruangan,id',
            'tanggal_pinjam' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'dokumen_surat' => 'required|mimes:pdf|max:2048',
            'fasilitas' => 'nullable|array',
        ]);

        $tanggal = date('Y-m-d', strtotime($request->tanggal_pinjam));
        
        try {
            $response = Http::get('https://api-harilibur.vercel.app/api');
            if ($response->successful()) {
                $holidays = $response->json();
                foreach ($holidays as $holiday) {
                    if ($holiday['holiday_date'] === $tanggal && $holiday['is_national_holiday'] === true) {
                        return back()->with('error', 'Tanggal yang dipilih adalah hari libur (' . $holiday['holiday_name'] . '). Tidak dapat melakukan peminjaman.');
                    }
                }
            }
        } catch (\Exception $e) {
        }

        $filePath = $request->file('dokumen_surat')->store('dokumen_surat', 'public');

        $peminjaman = Peminjaman::create([
            'user_id' => Auth::id(),
            'ruangan_id' => $request->ruangan_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'Pending',
            'dokumen_surat' => $filePath,
        ]);

        if ($request->has('fasilitas')) {
            foreach ($request->fasilitas as $fasilitas_id) {
                $peminjaman->fasilitas()->attach($fasilitas_id, ['jumlah_dipinjam' => 1]);
            }
        }

        return redirect()->route('mahasiswa.dashboard')->with('success', 'Pengajuan peminjaman berhasil dikirim dan menunggu persetujuan.');
    }
}