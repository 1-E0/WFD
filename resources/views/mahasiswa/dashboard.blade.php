@extends('layouts.mahasiswa')
@section('title', 'Riwayat Peminjaman')
@section('header', 'Riwayat Peminjaman Saya')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-bold text-gray-800">Daftar Pengajuan</h2>
        <a href="{{ route('mahasiswa.peminjaman.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-sm transition shadow-sm">
            + Buat Pengajuan Baru
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
                    <th class="py-3 px-4 font-semibold">Tanggal</th>
                    <th class="py-3 px-4 font-semibold">Waktu</th>
                    <th class="py-3 px-4 font-semibold">Ruangan</th>
                    <th class="py-3 px-4 font-semibold">Fasilitas Tambahan</th>
                    <th class="py-3 px-4 font-semibold">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($peminjaman as $p)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-4 text-sm text-gray-800 font-medium">{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}</td>
                    <td class="py-3 px-4 text-sm text-gray-600">{{ $p->jam_mulai }} - {{ $p->jam_selesai }}</td>
                    <td class="py-3 px-4 text-sm text-gray-800 font-bold">{{ $p->ruangan->nama_ruang }}</td>
                    <td class="py-3 px-4 text-sm text-gray-600">
                        @if($p->fasilitas->count() > 0)
                            <div class="flex flex-wrap gap-1">
                                @foreach($p->fasilitas as $fasilitas)
                                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">{{ $fasilitas->nama_fasilitas }}</span>
                                @endforeach
                            </div>
                        @else
                            -
                        @endif
                    </td>
                    <td class="py-3 px-4 text-sm">
                        @if($p->status == 'Pending')
                            <span class="bg-yellow-100 text-yellow-800 font-semibold px-3 py-1 rounded-full text-xs">Pending</span>
                        @elseif($p->status == 'Approved')
                            <span class="bg-green-100 text-green-800 font-semibold px-3 py-1 rounded-full text-xs">Approved</span>
                        @else
                            <span class="bg-red-100 text-red-800 font-semibold px-3 py-1 rounded-full text-xs">Rejected</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500 text-sm">Anda belum memiliki riwayat peminjaman.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection