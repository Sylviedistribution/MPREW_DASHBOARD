<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login()
    {
        return view('#auth/connexion');
    }

    // Traitement de la soumission du formulaire de connexion
    public function loginAction(Request $request)
    {
        // Validation des données d'entrée
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Récupérer les identifiants
        $credentials = $request->only('email', 'password');

        if (Auth::guard('artisan')->attempt($credentials)) {
            Auth::guard('admin')->logout(); // Déconnecte l'admin
            $request->session()->regenerate();
            return redirect()->route('index')->with('success', "Connexion réussie en tant qu'Artisan.");
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            Auth::guard('artisan')->logout(); // Déconnecte l'artisan
            $request->session()->regenerate();
            return redirect()->route('index')->with('success', "Bienvenue administrateur.");
        }

        // Échec de l'authentification
        return back()->withErrors([
            'email' => 'Identifiants incorrects pour Artisan.',
            'password' => 'Veuillez vérifier votre mot de passe.',
        ]);
    }


    // Déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Auth::guard('artisan')->logout();

        // Invalidation de la session
        $request->session()->invalidate();

        // Redirection vers la page d'accueil après la déconnexion
        return redirect('/login');
    }

}
