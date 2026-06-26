<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMRUANG - Peminjaman Fasilitas Kampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #ffffff 0%, #e8f9f2 50%, #f0f7ff 100%);
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">

    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-2 md:hidden">
                    <button class="text-gray-600 hover:text-gray-900 p-2 text-xl">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <a href="{{ route('landing') }}" class="text-xl font-bold text-blue-700 tracking-tight">SIMRUANG</a>
                </div>
                
                <div class="hidden md:flex items-center gap-2">
                    <a href="{{ route('landing') }}" class="text-2xl font-bold text-blue-700 tracking-tight">SIMRUANG</a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-[#1c5cf1] font-bold border-b-2 border-[#1c5cf1] pb-1">Home</a>
                    <a href="#" class="text-gray-600 hover:text-[#1c5cf1] transition font-medium">Fasilitas</a>
                    <a href="#" class="text-gray-600 hover:text-[#1c5cf1] transition font-medium">Bantuan</a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('register') }}" class="hidden md:block text-[#1c5cf1] bg-white border border-gray-300 hover:bg-gray-50 px-5 py-2 rounded-full text-sm font-semibold transition">
                        Register
                    </a>
                    <a href="{{ route('login') }}" class="text-[#1c5cf1] md:text-white md:bg-[#1c5cf1] hover:bg-blue-700 md:px-6 py-2 rounded-full text-sm font-semibold transition">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="hero-gradient relative pt-20 pb-28 px-4 sm:px-6 lg:px-8 text-center overflow-hidden">
        <div class="max-w-3xl mx-auto relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight mb-6">
                Pinjam Fasilitas Kampus dengan Mudah
            </h1>
            <p class="text-gray-600 text-lg mb-10 max-w-2xl mx-auto">
                Sistem Informasi Manajemen Ruangan (SIMRUANG) mempermudah Anda dalam mencari, melihat ketersediaan, dan memesan ruangan untuk kegiatan akademik maupun non-akademik dalam satu platform yang terintegrasi.
            </p>
            
            <div class="bg-white p-2 rounded-full shadow-md max-w-2xl mx-auto flex items-center border border-gray-200">
                <i class="fa-solid fa-magnifying-glass text-gray-400 ml-4 mr-2"></i>
                <input type="text" placeholder="Cari Aula, Ruang Kelas, Laboratorium..." class="flex-1 bg-transparent border-none outline-none py-3 text-gray-700 w-full text-sm sm:text-base">
                <button class="bg-[#1c5cf1] hover:bg-blue-700 text-white px-6 sm:px-8 py-3 rounded-full font-medium transition text-sm whitespace-nowrap">
                    Cari Ruang
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Katalog Ruangan</h2>
                <p class="text-gray-500 mt-1">Ruangan yang sering dipinjam minggu ini.</p>
            </div>
            <a href="#" class="hidden md:flex text-[#1c5cf1] font-semibold hover:underline items-center gap-1 text-sm">
                Lihat Semua <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($ruangans as $r)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden flex flex-col">
                <div class="relative h-48 bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80" alt="Ruangan" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4 bg-[#a7f3d0] text-[#065f46] text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-sm">
                        <div class="w-2 h-2 bg-[#059669] rounded-full"></div>
                        Tersedia
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="text-lg font-bold text-gray-900">{{ $r->nama_ruang }}</h3>
                    <p class="text-gray-500 text-sm mt-2 flex-1">{{ Str::limit($r->deskripsi ?? 'Fasilitas presentasi lengkap standar konferensi.', 70) }}</p>
                    
                    <div class="flex items-center gap-4 mt-6 mb-6 text-sm text-gray-700 font-medium">
                        <div class="flex items-center gap-2"><i class="fa-solid fa-users text-gray-400"></i> {{ $r->kapasitas }}</div>
                        <div class="flex items-center gap-2"><i class="fa-regular fa-snowflake text-gray-400"></i> AC</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-wifi text-gray-400"></i> WiFi</div>
                    </div>
                    
                    <a href="{{ route('login') }}" class="w-full text-center border border-[#1c5cf1] text-[#1c5cf1] hover:bg-blue-50 font-semibold py-2.5 rounded-xl transition text-sm">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-1 md:col-span-3 text-center py-10 text-gray-500">
                Data ruangan belum ditambahkan oleh Admin.
            </div>
            @endforelse
        </div>
        
        <div class="mt-6 text-center md:hidden">
            <a href="#" class="text-[#1c5cf1] font-semibold hover:underline text-sm">Lihat Semua Katalog</a>
        </div>
    </div>

</body>
</html>