<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // 1. Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('login');
        }

        // 2. Ambil role_id dari user yang sedang login
        $userRole = Auth::user()->role_id;

        // 3. Logika pengecekan akses
        // Role 1 = Admin, Role 2 = Mahasiswa
        if ($role == 'admin' && $userRole == 1) {
            return $next($request);
        }

        if ($role == 'mahasiswa' && $userRole == 2) {
            return $next($request);
        }

        // 4. Jika role tidak cocok, kembalikan Error 403
        abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}