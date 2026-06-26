@extends('layouts.admin')

@section('title', 'Manajemen Persetujuan')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-1.5">Manajemen Persetujuan (Approval)</h1>
        <p class="text-gray-500 text-sm">Tinjau dan kelola permintaan peminjaman ruangan yang masuk.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 p-3 rounded-lg mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </div>
            <input type="text" placeholder="Cari nama mahasiswa atau ruangan..." class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#0b5cff] focus:border-[#0b5cff] block pl-10 p-2.5 outline-none transition">
        </div>
        <button class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2.5 rounded-lg text-sm font-medium flex items-center gap-2 justify-center transition">
            <i class="fa-solid fa-filter"></i> Filter
        </button>
    </div>

    <div class="md:hidden space-y-4">
        @forelse($peminjamans ?? [1,2,3] as $p)
        <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h3 class="font-semibold text-gray-900 text-sm">{{ $p->user->name ?? 'Budi Santoso' }}</h3>
                    <p class="text-xs text-gray-500">NIM: {{ $p->user->nim ?? '1029384756' }}</p>
                </div>
                <span class="inline-flex items-center px-2 py-1 rounded-md text-[10px] font-bold bg-yellow-100 text-yellow-800">
                    PENDING
                </span>
            </div>
            <div class="mb-3">
                <p class="text-sm font-medium text-gray-900">{{ $p->ruangan->nama_ruang ?? 'Auditorium Utama' }}</p>
                <p class="text-xs text-gray-500">24 Okt 2023, 08:00 - 12:00</p>
            </div>
            <div class="flex gap-2 border-t border-gray-100 pt-3">
                <button class="flex-1 bg-[#059669] hover:bg-green-700 text-white text-xs font-medium py-2 rounded-lg transition flex items-center justify-center gap-1.5">
                    <i class="fa-solid fa-check"></i> Approve
                </button>
                <button class="flex-1 bg-white border border-red-500 text-red-500 hover:bg-red-50 text-xs font-medium py-2 rounded-lg transition flex items-center justify-center gap-1.5">
                    <i class="fa-solid fa-xmark"></i> Reject
                </button>
            </div>
        </div>
        @empty
        <div class="text-center py-8 text-gray-500 bg-white rounded-xl border border-gray-200">
            Tidak ada permohonan.
        </div>
        @endforelse
    </div>

    <div class="hidden md:block bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-semibold">Nama Mahasiswa</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Ruangan</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Tanggal & Waktu</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Fasilitas</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Dokumen</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Status</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($peminjamans ?? [1,2,3] as $index => $p)
                    <tr class="hover:bg-gray-50 bg-white">
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-900">{{ $index == 0 ? 'Budi Santoso' : ($index == 1 ? 'Siti Aminah' : 'Agus Pratama') }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">NIM: 123456789</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-building text-[#0b5cff]"></i>
                                <span class="font-medium text-gray-900">{{ $index == 0 ? 'Auditorium Utama' : ($index == 1 ? 'Ruang Rapat B' : 'Laboratorium Komputer') }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-gray-900">24 Okt 2023</p>
                            <p class="text-xs text-gray-500 mt-0.5">08:00 - 12:00</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-1">
                                <span class="px-2 py-1 bg-gray-100 border border-gray-200 rounded-full text-[10px] font-medium text-gray-700">Proyektor</span>
                                <span class="px-2 py-1 bg-gray-100 border border-gray-200 rounded-full text-[10px] font-medium text-gray-700">Mic</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="flex items-center gap-1.5 text-[#0b5cff] hover:underline text-xs font-medium">
                                <i class="fa-regular fa-file-pdf"></i> Surat_Izin.pdf
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            @if($index < 2)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200 gap-1.5">
                                    <i class="fa-solid fa-ellipsis h-1 w-1"></i> PENDING
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-[#69ffb4] text-green-900 border border-green-300 gap-1.5">
                                    <i class="fa-solid fa-check h-1 w-1"></i> APPROVED
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            @if($index < 2)
                                <div class="flex justify-end gap-2">
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        <button class="bg-[#059669] hover:bg-green-700 text-white text-xs font-medium px-3 py-1.5 rounded-lg transition flex items-center gap-1.5">
                                            <i class="fa-solid fa-check"></i> Approve
                                        </button>
                                    </form>
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        <button class="bg-white border border-red-500 text-red-500 hover:bg-red-50 text-xs font-medium px-3 py-1.5 rounded-lg transition flex items-center gap-1.5">
                                            <i class="fa-solid fa-xmark"></i> Reject
                                        </button>
                                    </form>
                                </div>
                            @else
                                <button class="bg-white border border-gray-300 text-gray-400 hover:bg-gray-50 text-xs font-medium px-3 py-1.5 rounded-lg transition flex items-center gap-1.5 ml-auto">
                                    <i class="fa-regular fa-eye"></i> View
                                </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            Belum ada pengajuan peminjaman ruangan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between bg-gray-50">
            <span class="text-sm text-gray-500">Showing 1 to 3 of 12 entries</span>
            <div class="flex items-center gap-1">
                <button class="px-3 py-1 border border-gray-300 bg-white text-gray-500 rounded hover:bg-gray-50"><i class="fa-solid fa-chevron-left text-xs"></i></button>
                <button class="px-3 py-1 border border-[#0b5cff] bg-[#0b5cff] text-white rounded">1</button>
                <button class="px-3 py-1 border border-gray-300 bg-white text-gray-700 rounded hover:bg-gray-50">2</button>
                <button class="px-3 py-1 border border-gray-300 bg-white text-gray-700 rounded hover:bg-gray-50">3</button>
                <button class="px-3 py-1 border border-gray-300 bg-white text-gray-500 rounded hover:bg-gray-50"><i class="fa-solid fa-chevron-right text-xs"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection