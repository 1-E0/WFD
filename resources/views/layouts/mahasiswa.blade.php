<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SIMRUANG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#f8fafc] flex h-screen overflow-hidden">
    <aside class="w-64 bg-white border-r border-gray-100 flex-col hidden md:flex">
        <div class="h-20 flex items-center px-6">
            <a href="#" class="text-2xl font-bold text-[#0b5cff] tracking-tight">SIMRUANG</a>
        </div>
        
        <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#0b5cff] text-white flex items-center justify-center font-bold text-sm">
                {{ strtoupper(substr(Auth::user()->name ?? 'User', 0, 2)) }}
            </div>
            <div>
                <h3 class="text-sm font-bold text-gray-900 truncate w-36">{{ Auth::user()->name ?? 'Mahasiswa' }}</h3>
                <p class="text-xs text-gray-500">Student</p>
            </div>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1">
            <a href="{{ route('mahasiswa.dashboard') ?? '#' }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('mahasiswa.dashboard') ? 'bg-gray-50 text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fa-solid fa-border-all w-5"></i> Dashboard
            </a>
            <a href="{{ route('mahasiswa.peminjaman.create') ?? '#' }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('mahasiswa.peminjaman.create') ? 'bg-[#69ffb4] text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fa-regular fa-calendar-check w-5"></i> Pinjam Ruangan
            </a>
            <a href="{{ route('mahasiswa.peminjaman.index') ?? '#' }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('mahasiswa.peminjaman.index') ? 'bg-gray-50 text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fa-solid fa-clock-rotate-left w-5"></i> Riwayat Saya
            </a>
        </nav>

        <div class="p-4 border-t border-gray-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50 w-full transition">
                    <i class="fa-solid fa-arrow-right-from-bracket w-5"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        <header class="md:hidden bg-white h-16 border-b border-gray-100 flex items-center justify-between px-4">
            <div class="flex items-center gap-3">
                <button class="text-gray-600"><i class="fa-solid fa-bars text-lg"></i></button>
                <span class="font-bold text-[#0b5cff] text-lg">SIMRUANG</span>
            </div>
            <div class="w-8 h-8 rounded-full bg-[#0b5cff] text-white flex items-center justify-center font-bold text-xs">
                {{ strtoupper(substr(Auth::user()->name ?? 'User', 0, 2)) }}
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 md:p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>