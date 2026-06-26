@extends('layouts.mahasiswa')

@section('title', 'Form Peminjaman Ruangan')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Form Peminjaman Ruangan</h1>
        <p class="text-gray-500 text-sm">Lengkapi formulir di bawah ini untuk mengajukan peminjaman fasilitas kampus.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-lg mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-6 text-sm">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('mahasiswa.peminjaman.store') }}" method="POST" enctype="multipart/form-data" class="bg-white border border-gray-200 rounded-2xl p-6 md:p-8 shadow-sm">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Pilih Ruangan <span class="text-red-500">*</span></label>
                <div class="relative">
                    <select name="ruangan_id" required class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#0b5cff] focus:border-[#0b5cff] p-2.5 outline-none appearance-none cursor-pointer pr-10">
                        <option value="">Pilih salah satu ruangan...</option>
                        @if(isset($ruangans))
                            @foreach($ruangans as $ruangan)
                                <option value="{{ $ruangan->id }}">{{ $ruangan->nama_ruang }} (Kapasitas: {{ $ruangan->kapasitas }})</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-chevron-down text-gray-400 text-xs"></i>
                    </div>
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Tanggal Kegiatan <span class="text-red-500">*</span></label>
                <input type="date" name="tanggal_pinjam" required class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#0b5cff] focus:border-[#0b5cff] p-2.5 outline-none text-gray-600">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Waktu Mulai <span class="text-red-500">*</span></label>
                <input type="time" name="jam_mulai" required class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#0b5cff] focus:border-[#0b5cff] p-2.5 outline-none text-gray-600">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Waktu Selesai <span class="text-red-500">*</span></label>
                <input type="time" name="jam_selesai" required class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#0b5cff] focus:border-[#0b5cff] p-2.5 outline-none text-gray-600">
            </div>
        </div>

        <div class="mb-8 border-t border-gray-100 pt-6">
            <h3 class="text-base font-semibold text-gray-900 mb-1">Fasilitas Tambahan</h3>
            <p class="text-gray-500 text-sm mb-4">Pilih fasilitas tambahan yang diperlukan (opsional).</p>
            
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @if(isset($fasilitas))
                        @foreach($fasilitas as $item)
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="fasilitas[]" value="{{ $item->id }}" class="w-4 h-4 text-[#0b5cff] bg-white border-gray-300 rounded focus:ring-[#0b5cff]">
                            <span class="text-sm text-gray-700"><i class="fa-solid fa-box text-gray-400 mr-1"></i> {{ $item->nama_fasilitas }}</span>
                        </label>
                        @endforeach
                    @else
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-[#0b5cff] bg-white border-gray-300 rounded focus:ring-[#0b5cff]">
                            <span class="text-sm text-gray-700"><i class="fa-solid fa-video text-gray-400 mr-1"></i> Proyektor</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-[#0b5cff] bg-white border-gray-300 rounded focus:ring-[#0b5cff]">
                            <span class="text-sm text-gray-700"><i class="fa-solid fa-speaker-deck text-gray-400 mr-1"></i> Sound System</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-[#0b5cff] bg-white border-gray-300 rounded focus:ring-[#0b5cff]">
                            <span class="text-sm text-gray-700"><i class="fa-solid fa-chair text-gray-400 mr-1"></i> Kursi Ekstra</span>
                        </label>
                    @endif
                </div>
            </div>
        </div>

        <div class="mb-8 border-t border-gray-100 pt-6">
            <h3 class="text-base font-semibold text-gray-900 mb-1">Dokumen Pendukung <span class="text-red-500">*</span></h3>
            <p class="text-gray-500 text-sm mb-4">Unggah proposal kegiatan atau surat persetujuan (Format PDF, maks 5MB).</p>

            <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:bg-gray-50 transition cursor-pointer relative group">
                <input type="file" name="dokumen_surat" accept=".pdf" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                <div class="w-12 h-12 bg-gray-100 group-hover:bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-3 transition">
                    <i class="fa-solid fa-cloud-arrow-up text-gray-500 group-hover:text-[#0b5cff] text-xl"></i>
                </div>
                <p class="text-sm font-medium text-gray-900">Klik untuk mengunggah atau seret file ke sini</p>
                <p class="text-xs text-gray-500 mt-1">Hanya file PDF yang diizinkan</p>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">
            <a href="{{ route('mahasiswa.dashboard') ?? '#' }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition">
                Batal
            </a>
            <button type="submit" class="bg-[#1d4ed8] hover:bg-blue-800 text-white px-6 py-2.5 rounded-lg text-sm font-medium flex items-center gap-2 transition">
                <i class="fa-regular fa-paper-plane"></i> Kirim Pengajuan Peminjaman
            </button>
        </div>
    </form>
</div>
@endsection