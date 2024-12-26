<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si l'utilisateur est connecté et a le rôle admin ou artisan
        if (auth('admin')->check() || auth('artisan')->check()) {
            return $next($request);  // L'utilisateur a l'un des rôles, on continue l'accès
        }

        // Sinon, rediriger ou renvoyer une erreur
        return redirect()->route('login');  // Redirige vers la page de connexion si non autorisé
    }
}
