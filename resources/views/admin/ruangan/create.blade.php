@extends('layouts.admin')
@section('title', 'Tambah Ruangan')
@section('header', 'Tambah Data Ruangan')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 max-w-2xl">
    <form action="{{ route('admin.ruangan.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Ruangan</label>
            <input type="text" name="nama_ruang" value="{{ old('nama_ruang') }}" required
                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3 outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Kapasitas (Orang)</label>
            <input type="number" name="kapasitas" value="{{ old('kapasitas') }}" required min="1"
                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3 outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Fasilitas Ruangan</label>
            <textarea name="deskripsi" rows="4"
                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3 outline-none">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.ruangan.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-lg transition">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">Simpan</button>
        </div>
    </form>
</div>
@endsection