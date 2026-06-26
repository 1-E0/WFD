@extends('layouts.admin')
@section('title', 'Kelola Ruangan')
@section('header', 'Data Master Ruangan')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-bold text-gray-800">Daftar Ruangan Tersedia</h2>
        <a href="{{ route('admin.ruangan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
            + Tambah Ruangan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 text-green-700 p-3 rounded-lg mb-4 text-sm font-medium border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
                    <th class="py-3 px-4 font-semibold">No</th>
                    <th class="py-3 px-4 font-semibold">Nama Ruangan</th>
                    <th class="py-3 px-4 font-semibold">Kapasitas</th>
                    <th class="py-3 px-4 font-semibold">Deskripsi</th>
                    <th class="py-3 px-4 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($ruangans as $index => $r)
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                    <td class="py-3 px-4 text-sm font-bold text-gray-800">{{ $r->nama_ruang }}</td>
                    <td class="py-3 px-4 text-sm text-gray-600">{{ $r->kapasitas }} Orang</td>
                    <td class="py-3 px-4 text-sm text-gray-500 truncate max-w-xs">{{ $r->deskripsi }}</td>
                    <td class="py-3 px-4 flex justify-end gap-2">
                        <form action="{{ route('admin.ruangan.destroy', $r->id) }}" method="POST" onsubmit="return confirm('Hapus ruangan ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-100 px-3 py-1 rounded text-xs font-semibold transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500 text-sm">Belum ada data ruangan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection