<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SIMRUANG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-[#f4f7f6] min-h-screen flex items-center justify-center relative overflow-hidden py-10">

    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>

    <div class="bg-white p-8 sm:p-10 rounded-2xl shadow-sm border border-gray-100 w-full max-w-md relative z-10">
        
        <div class="flex flex-col items-center justify-center mb-8">
            <div class="text-blue-700 text-3xl font-bold flex items-center gap-2 mb-6">
                <i class="fa-solid fa-graduation-cap"></i> SIMRUANG
            </div>
            <h1 class="text-2xl font-bold text-gray-900 text-center">Buat Akun Baru</h1>
            <p class="text-gray-500 text-sm mt-1 text-center">Lengkapi data di bawah ini untuk mendaftar.</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 p-3 rounded-lg mb-6 text-sm">
                <ul class="list-disc pl-4">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">Nama Lengkap</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-regular fa-user text-gray-400"></i>
                    </div>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap Anda" required
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 block pl-10 p-3 outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">NIM / NIP</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-regular fa-id-badge text-gray-400"></i>
                    </div>
                    <input type="text" name="nim" placeholder="Masukkan NIM atau NIP Anda"
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 block pl-10 p-3 outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">Email Kampus</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-regular fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@kampus.ac.id" required
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 block pl-10 p-3 outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" name="password" placeholder="Masukkan password Anda" required minlength="8"
                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 block pl-10 pr-10 p-3 outline-none transition">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                        <i class="fa-regular fa-eye text-gray-400 hover:text-gray-600"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">Minimal 8 karakter.</p>
            </div>

            <button type="submit" class="w-full bg-[#1c5cf1] hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition-colors text-sm flex justify-center items-center gap-2 mt-4 z-20 relative">
                Daftar <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-[#1c5cf1] font-semibold hover:underline">Login di sini</a>
        </div>
    </div>
    
    <div class="absolute bottom-4 w-full text-center text-xs text-gray-400">
        &copy; 2024 SIMRUANG Campus Facilities.
    </div>

</body>
</html>