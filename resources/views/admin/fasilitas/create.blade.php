@extends('layouts.admin')
@section('title', 'Tambah Fasilitas')
@section('header', 'Tambah Data Fasilitas')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 max-w-2xl">
    <form action="{{ route('admin.fasilitas.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Fasilitas</label>
            <input type="text" name="nama_fasilitas" value="{{ old('nama_fasilitas') }}" required
                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3 outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Stok Tersedia (Unit)</label>
            <input type="number" name="stok_tersedia" value="{{ old('stok_tersedia') }}" required min="1"
                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3 outline-none">
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.fasilitas.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-lg transition">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">Simpan</button>
        </div>
    </form>
</div>
@endsection