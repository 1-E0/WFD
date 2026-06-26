<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMRUANG - Peminjaman Fasilitas Kampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-gradient {
            background: radial-gradient(circle at 80% 80%, rgba(167, 243, 208, 0.4) 0%, transparent 40%),
                        radial-gradient(circle at 20% 20%, rgba(224, 231, 255, 0.6) 0%, transparent 50%);
            background-color: #f8fafc;
        }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-2 md:hidden">
                    <button class="text-gray-600 hover:text-gray-900 p-2 text-xl">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <a href="{{ route('landing') }}" class="text-xl font-bold text-[#0b5cff] tracking-tight">SIMRUANG</a>
                </div>
                
                <div class="hidden md:flex items-center gap-2">
                    <a href="{{ route('landing') }}" class="text-2xl font-bold text-[#0b5cff] tracking-tight">SIMRUANG</a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-[#0b5cff] font-bold border-b-2 border-[#0b5cff] pb-1">Home</a>
                    <a href="#" class="text-gray-600 hover:text-[#0b5cff] transition font-medium">Fasilitas</a>
                    <a href="#" class="text-gray-600 hover:text-[#0b5cff] transition font-medium">Bantuan</a>
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ Auth::user()->role_id == 1 ? route('admin.dashboard') : route('mahasiswa.dashboard') }}" class="hidden md:block text-[#0b5cff] bg-white border border-[#0b5cff] hover:bg-blue-50 px-5 py-2 rounded-full text-sm font-semibold transition">
                            Dashboard
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-white bg-red-500 hover:bg-red-600 px-6 py-2 rounded-full text-sm font-semibold transition">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('register') }}" class="hidden md:block text-[#0b5cff] bg-white border border-gray-300 hover:bg-gray-50 px-5 py-2 rounded-full text-sm font-semibold transition">
                            Register
                        </a>
                        <a href="{{ route('login') }}" class="text-white bg-[#0b5cff] hover:bg-blue-700 px-6 py-2 rounded-full text-sm font-semibold transition">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="hero-gradient relative pt-24 pb-32 px-4 sm:px-6 lg:px-8 text-center border-b border-gray-100">
        <div class="max-w-3xl mx-auto relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-6">
                Pinjam Fasilitas Kampus dengan Mudah
            </h1>
            <p class="text-gray-600 text-lg mb-10 max-w-2xl mx-auto">
                Cari, pilih, dan reservasi ruangan untuk kegiatan akademik maupun non-akademik dalam satu platform yang terintegrasi.
            </p>
            
            <div class="bg-white p-2 rounded-full shadow-sm max-w-2xl mx-auto flex items-center border border-gray-300">
                <i class="fa-solid fa-magnifying-glass text-gray-500 ml-4 mr-2"></i>
                <input type="text" placeholder="Cari Aula, Ruang Kelas, Laboratorium..." class="flex-1 bg-transparent border-none outline-none py-2 text-gray-700 w-full text-sm sm:text-base">
                <button class="bg-[#0b5cff] hover:bg-blue-700 text-white px-8 py-2.5 rounded-full font-medium transition text-sm whitespace-nowrap">
                    Cari Ruang
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Fasilitas Populer</h2>
                <p class="text-gray-500 mt-1 text-sm">Ruangan yang sering dipinjam minggu ini.</p>
            </div>
            <a href="#" class="hidden md:flex text-[#0b5cff] font-semibold hover:underline items-center gap-1 text-sm">
                Lihat Semua <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($ruangans as $r)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col">
                <div class="relative h-48 bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80" alt="Ruangan" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4 bg-white text-gray-700 text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-sm border border-gray-200">
                        <div class="w-2 h-2 bg-[#059669] rounded-full"></div>
                        Tersedia
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="text-lg font-bold text-gray-900">{{ $r->nama_ruang }}</h3>
                    <p class="text-gray-500 text-sm mt-2 flex-1">{{ Str::limit($r->deskripsi ?? 'Fasilitas presentasi lengkap dengan sound system standar konferensi.', 70) }}</p>
                    
                    <div class="flex items-center gap-4 mt-6 mb-6 text-xs text-gray-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-users text-gray-400"></i> {{ $r->kapasitas }} Kursi</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-snowflake text-gray-400"></i> AC</div>
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-wifi text-gray-400"></i> WiFi</div>
                    </div>
                    
                    <a href="{{ route('login') }}" class="w-full text-center border border-[#0b5cff] text-[#0b5cff] hover:bg-blue-50 font-semibold py-2 rounded-lg transition text-sm">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-1 md:col-span-3 text-center py-10 text-gray-500">
                Data ruangan belum tersedia.
            </div>
            @endforelse
        </div>
        
        <div class="mt-6 text-center md:hidden">
            <a href="#" class="text-[#0b5cff] font-semibold hover:underline text-sm">Lihat Semua <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</body>
</html>