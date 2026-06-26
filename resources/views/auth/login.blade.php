<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIMRUANG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 sm:p-10 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-100 w-full max-w-[420px]">
        <div class="flex flex-col items-center justify-center mb-8">
            <div class="text-[#0b5cff] text-2xl font-bold flex items-center gap-2 mb-6">
                <i class="fa-solid fa-building-columns"></i> SIMRUANG
            </div>
            <h1 class="text-xl font-bold text-gray-900 text-center mb-2">Selamat Datang</h1>
            <p class="text-gray-500 text-sm text-center">Silakan masuk ke akun Anda untuk melanjutkan.</p>
        </div>

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-600 p-3 rounded-lg mb-6 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">Email atau NIM</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-regular fa-user text-gray-400"></i>
                    </div>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Masukkan email atau NIM" required
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-[#0b5cff] focus:border-[#0b5cff] block pl-10 p-2.5 outline-none transition">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="block text-sm font-medium text-gray-900">Password</label>
                    <a href="#" class="text-sm text-[#0b5cff] hover:underline">Lupa Password?</a>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" name="password" placeholder="Masukkan password" required
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-[#0b5cff] focus:border-[#0b5cff] block pl-10 pr-10 p-2.5 outline-none transition">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                        <i class="fa-regular fa-eye text-gray-400 hover:text-gray-600"></i>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-[#0b5cff] hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors text-sm flex justify-center items-center gap-2 mt-2">
                Masuk <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-600">
            Belum punya akun? <a href="{{ route('register') }}" class="text-[#0b5cff] hover:underline">Daftar Sekarang</a>
        </div>
    </div>
</body>
</html>