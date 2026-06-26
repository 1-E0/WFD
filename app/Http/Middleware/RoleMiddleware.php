<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userRole = Auth::user()->role_id;
        
        if ($role == 'admin' && $userRole == 1) {
            return $next($request);
        }

        if ($role == 'mahasiswa' && $userRole == 2) {
            return $next($request);
        }

        abort(403, 'Akses Ditolak');
    }
}