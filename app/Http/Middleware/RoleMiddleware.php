<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Verifica si el usuario está autenticado y tiene el rol correcto
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Redirige si el usuario no tiene el rol adecuado
        return redirect('/')->with('error', 'No tienes acceso a esta sección.');
    }
}
