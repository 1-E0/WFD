@extends('layouts.admin')
@section('title', 'Approval Management')
@section('header', 'Manajemen Persetujuan (Approval)')
@section('subheader', 'Tinjau dan kelola permintaan peminjaman ruangan yang masuk.')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    
    <div class="p-5 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
        <div class="relative w-full sm:w-96">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </div>
            <input type="text" placeholder="Cari nama mahasiswa atau ruangan..." 
                class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-1 focus:ring-blue-600 focus:border-blue-600 block pl-10 p-2.5 outline-none transition">
        </div>
        <button class="flex items-center gap-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 px-4 py-2.5 rounded-xl text-sm font-medium transition whitespace-nowrap">
            <i class="fa-solid fa-filter"></i> Filter
        </button>
    </div>

    @if(session('success'))
        <div class="bg-green-50 text-green-700 p-4 text-sm font-medium border-b border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-700 text-sm border-b border-gray-200">
                    <th class="py-4 px-5 font-semibold">Nama Mahasiswa</th>
                    <th class="py-4 px-5 font-semibold">Ruangan</th>
                    <th class="py-4 px-5 font-semibold">Tanggal & Waktu</th>
                    <th class="py-4 px-5 font-semibold">Fasilitas</th>
                    <th class="py-4 px-5 font-semibold">Dokumen</th>
                    <th class="py-4 px-5 font-semibold">Status</th>
                    <th class="py-4 px-5 font-semibold text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($peminjaman as $p)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4 px-5">
                        <p class="text-sm font-bold text-gray-900">{{ $p->user->name }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">NIM: {{ $p->user->email }}</p>
                    </td>
                    <td class="py-4 px-5">
                        <div class="flex items-center gap-3">
                            <div class="text-blue-600"><i class="fa-regular fa-building text-lg"></i></div>
                            <span class="text-sm text-gray-800 font-medium">{{ $p->ruangan->nama_ruang }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-5 text-sm text-gray-700">
                        <p>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">{{ date('H:i', strtotime($p->jam_mulai)) }} - {{ date('H:i', strtotime($p->jam_selesai)) }}</p>
                    </td>
                    <td class="py-4 px-5 text-sm">
                        @if($p->fasilitas->count() > 0)
                            <div class="flex flex-wrap gap-2">
                                @foreach($p->fasilitas as $fasilitas)
                                    <span class="bg-gray-100 text-gray-600 text-xs px-2.5 py-1 rounded-full border border-gray-200">{{ $fasilitas->nama_fasilitas }}</span>
                                @endforeach
                            </div>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="py-4 px-5 text-sm">
                        <a href="{{ asset('storage/' . $p->dokumen_surat) }}" target="_blank" class="flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium text-xs">
                            <i class="fa-regular fa-file-pdf text-lg"></i> Proposal.pdf
                        </a>
                    </td>
                    <td class="py-4 px-5 text-sm">
                        @if($p->status == 'Pending')
                            <span class="inline-flex items-center gap-1.5 bg-[#fef3c7] text-[#92400e] font-semibold px-3 py-1 rounded-full text-xs">
                                <i class="fa-solid fa-ellipsis"></i> PENDING
                            </span>
                        @elseif($p->status == 'Approved')
                            <span class="inline-flex items-center gap-1.5 bg-[#d1fae5] text-[#065f46] font-semibold px-3 py-1 rounded-full text-xs">
                                <i class="fa-regular fa-circle-check"></i> APPROVED
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 bg-red-100 text-red-800 font-semibold px-3 py-1 rounded-full text-xs">
                                <i class="fa-regular fa-circle-xmark"></i> REJECTED
                            </span>
                        @endif
                    </td>
                    <td class="py-4 px-5 flex justify-end gap-2">
                        @if($p->status == 'Pending')
                            <form action="{{ route('admin.peminjaman.updateStatus', $p->id) }}" method="POST">
                                @csrf @method('PUT')
                                <input type="hidden" name="status" value="Approved">
                                <button type="submit" class="flex items-center gap-1.5 bg-[#059669] hover:bg-green-700 text-white px-3 py-1.5 rounded-lg text-sm font-medium transition">
                                    <i class="fa-solid fa-check"></i> Approve
                                </button>
                            </form>
                            <form action="{{ route('admin.peminjaman.updateStatus', $p->id) }}" method="POST">
                                @csrf @method('PUT')
                                <input type="hidden" name="status" value="Rejected">
                                <button type="submit" class="flex items-center gap-1.5 border border-red-500 text-red-500 hover:bg-red-50 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                                    <i class="fa-solid fa-xmark"></i> Reject
                                </button>
                            </form>
                        @else
                            <button type="button" class="flex items-center gap-1.5 border border-gray-300 text-gray-500 px-3 py-1.5 rounded-lg text-sm font-medium cursor-not-allowed">
                                <i class="fa-regular fa-eye"></i> View
                            </button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-8 text-center text-gray-500 text-sm">Belum ada pengajuan peminjaman.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="p-4 border-t border-gray-200 bg-gray-50 flex items-center justify-between text-sm text-gray-600">
        <div>Showing 1 to {{ $peminjaman->count() }} entries</div>
        <div class="flex gap-1">
            <button class="px-3 py-1 bg-white border border-gray-300 rounded hover:bg-gray-50"><i class="fa-solid fa-chevron-left text-xs"></i></button>
            <button class="px-3 py-1 bg-blue-600 text-white rounded">1</button>
            <button class="px-3 py-1 bg-white border border-gray-300 rounded hover:bg-gray-50"><i class="fa-solid fa-chevron-right text-xs"></i></button>
        </div>
    </div>
</div>
@endsection