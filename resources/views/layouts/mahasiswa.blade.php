<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SIMRUANG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-[#f8f9fa] font-sans flex min-h-screen">

    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between hidden md:flex">
        <div>
            <div class="p-6 flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500">Student</p>
                </div>
            </div>

            <nav class="flex flex-col gap-1 px-4">
                <a href="{{ route('mahasiswa.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('mahasiswa.dashboard') ? 'bg-[#6ef0a4] text-gray-900 font-bold' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i class="fa-solid fa-clock-rotate-left w-5"></i>
                    <span class="text-sm">Riwayat Saya</span>
                </a>
                <a href="{{ route('mahasiswa.peminjaman.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('mahasiswa.peminjaman.create') ? 'bg-[#6ef0a4] text-gray-900 font-bold' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i class="fa-regular fa-calendar-plus w-5"></i>
                    <span class="text-sm">Pinjam Ruangan</span>
                </a>
            </nav>
        </div>

        <div class="p-6">
            <h1 class="text-2xl font-bold text-blue-700 tracking-tight">SIMRUANG</h1>
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="text-sm text-red-500 font-medium hover:underline flex items-center gap-2">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 p-8 overflow-y-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">@yield('header')</h1>
            <p class="text-gray-500 mt-1">@yield('subheader')</p>
        </div>
        
        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-6 text-sm font-medium shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>