@extends('layouts.admin')
@section('title', 'Dashboard')
@section('header', 'Overview Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 border-l-4 border-l-blue-500">
        <h3 class="text-gray-500 text-sm font-semibold mb-1">Total Ruangan</h3>
        <p class="text-3xl font-bold text-gray-800">12</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 border-l-4 border-l-green-500">
        <h3 class="text-gray-500 text-sm font-semibold mb-1">Peminjaman Disetujui</h3>
        <p class="text-3xl font-bold text-gray-800">45</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 border-l-4 border-l-yellow-500">
        <h3 class="text-gray-500 text-sm font-semibold mb-1">Menunggu Persetujuan</h3>
        <p class="text-3xl font-bold text-gray-800">5</p>
    </div>
</div>
@endsection