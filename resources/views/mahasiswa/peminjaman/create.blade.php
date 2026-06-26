@extends('layouts.mahasiswa')
@section('title', 'Pinjam Ruangan')
@section('header', 'Form Peminjaman Ruangan')
@section('subheader', 'Lengkapi formulir di bawah ini untuk mengajukan peminjaman fasilitas kampus.')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-200 max-w-4xl">
    <form action="{{ route('mahasiswa.peminjaman.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Pilih Ruangan <span class="text-red-500">*</span></label>
                <div class="relative">
                    <select name="ruangan_id" required class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 block p-3 appearance-none outline-none">
                        <option value="">Pilih salah satu ruangan...</option>
                        @foreach($ruangan as $r)
                            <option value="{{ $r->id }}" {{ old('ruangan_id') == $r->id ? 'selected' : '' }}>{{ $r->nama_ruang }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-chevron-down text-gray-400 text-sm"></i>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Tanggal Kegiatan <span class="text-red-500">*</span></label>
                <input type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}" required min="{{ date('Y-m-d') }}"
                    class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 block p-3 outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Waktu Mulai <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" required
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 block p-3 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Waktu Selesai <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" required
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 block p-3 outline-none">
                </div>
            </div>
        </div>

        <hr class="border-gray-200 my-6">

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-1">Fasilitas Tambahan</label>
            <p class="text-xs text-gray-500 mb-4">Pilih fasilitas tambahan yang diperlukan (opsional).</p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 bg-gray-50 p-4 rounded-xl border border-gray-200">
                @foreach($fasilitas as $f)
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" name="fasilitas[]" value="{{ $f->id }}" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-600">
                    <span class="text-sm font-medium text-gray-700 flex items-center gap-2">
                        <i class="fa-solid fa-box text-gray-400"></i> {{ $f->nama_fasilitas }}
                    </span>
                </label>
                @endforeach
            </div>
        </div>

        <hr class="border-gray-200 my-6">

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-1">Dokumen Pendukung <span class="text-red-500">*</span></label>
            <p class="text-xs text-gray-500 mb-4">Unggah proposal kegiatan atau surat persetujuan (Format PDF, maks 5MB).</p>
            
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <div class="w-12 h-12 bg-white rounded-full shadow-sm flex items-center justify-center mb-3">
                            <i class="fa-solid fa-cloud-arrow-up text-gray-600 text-xl"></i>
                        </div>
                        <p class="mb-1 text-sm text-gray-900 font-medium">Klik untuk mengunggah atau seret file ke sini</p>
                        <p class="text-xs text-gray-500">Hanya file PDF yang diizinkan</p>
                    </div>
                    <input id="dropzone-file" type="file" name="dokumen_surat" accept="application/pdf" class="hidden" required />
                </label>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6">
            <a href="{{ route('mahasiswa.dashboard') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg text-sm font-medium transition text-center">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-[#0b5cff] hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition flex items-center justify-center gap-2">
                <i class="fa-regular fa-paper-plane"></i> Kirim Pengajuan Peminjaman
            </button>
        </div>
    </form>
</div>
@endsection