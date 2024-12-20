<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté via le guard "admin"
        if (auth('admin')->check()) {
            return $next($request);
        }

        // Bloque l'accès avec une erreur 403 si ce n'est pas un admin
        abort(403, 'Accès non autorisé.');
    }
}
