<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SIMRUANG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] min-h-screen flex flex-col items-center justify-center p-4">
    <div class="mb-6">
        <div class="text-[#0b5cff] text-3xl font-bold flex items-center gap-2">
            <i class="fa-solid fa-graduation-cap"></i> SIMRUANG
        </div>
    </div>

    <div class="bg-white p-8 sm:p-10 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-100 w-full max-w-[460px]">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Buat Akun Baru</h1>
            <p class="text-gray-500 text-sm">Lengkapi data di bawah ini untuk mendaftar.</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 p-3 rounded-lg mb-6 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-1.5">Nama Lengkap</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-regular fa-user text-gray-400"></i>
                    </div>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap Anda" required
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-[#0b5cff] focus:border-[#0b5cff] block pl-10 p-2.5 outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-900 mb-1.5">NIM / NIP</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-regular fa-id-badge text-gray-400"></i>
                    </div>
                    <input type="text" name="nim" value="{{ old('nim') }}" placeholder="Masukkan NIM atau NIP Anda" required
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-[#0b5cff] focus:border-[#0b5cff] block pl-10 p-2.5 outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-900 mb-1.5">Email Kampus</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-regular fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@kampus.ac.id" required
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-[#0b5cff] focus:border-[#0b5cff] block pl-10 p-2.5 outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-900 mb-1.5">Password</label>
                <div class="relative mb-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" name="password" placeholder="Masukkan password Anda" required minlength="8"
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-[#0b5cff] focus:border-[#0b5cff] block pl-10 pr-10 p-2.5 outline-none transition">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                        <i class="fa-regular fa-eye text-gray-400 hover:text-gray-600"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500">Minimal 8 karakter.</p>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-[#1d4ed8] hover:bg-blue-800 text-white font-medium py-2.5 px-4 rounded-lg transition-colors text-sm flex justify-center items-center gap-2">
                    Daftar <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-[#0b5cff] font-semibold hover:underline">Login di sini</a>
        </div>
    </div>

    <div class="mt-8 text-sm text-gray-500">
        &copy; 2024 SIMRUANG Campus Facilities.
    </div>
</body>
</html>