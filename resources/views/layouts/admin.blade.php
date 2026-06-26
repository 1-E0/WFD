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
                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-600">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ Auth::user()->role_id == 1 ? 'Admin' : 'Student' }}</p>
                </div>
            </div>

            <nav class="flex flex-col gap-1 px-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#6ef0a4] text-gray-900 font-bold' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i class="fa-solid fa-border-all w-5"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
                <a href="{{ route('admin.ruangan.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.ruangan.*') ? 'bg-[#6ef0a4] text-gray-900 font-bold' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i class="fa-regular fa-calendar-plus w-5"></i>
                    <span class="text-sm">Kelola Ruangan</span>
                </a>
                <a href="{{ route('admin.fasilitas.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.fasilitas.*') ? 'bg-[#6ef0a4] text-gray-900 font-bold' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i class="fa-solid fa-list w-5"></i>
                    <span class="text-sm">Kelola Fasilitas</span>
                </a>
                <a href="{{ route('admin.peminjaman.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.peminjaman.*') ? 'bg-[#6ef0a4] text-gray-900 font-bold' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i class="fa-regular fa-square-check w-5"></i>
                    <span class="text-sm">Approval Management</span>
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

        @yield('content')
    </main>

</body>
</html>