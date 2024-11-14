<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // Validation des données du formulaire
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        // Authentification de l'utilisateur
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // En cas d'échec d'authentification, renvoie une erreur de validation
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
        // Régénération de la session
        $request->session()->regenerate();


        // Redirection vers le tableau de bord après une connexion réussise
        return redirect()->route('index');
    }

    // Déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        // Invalidation de la session
        $request->session()->invalidate();

        // Redirection vers la page d'accueil après la déconnexion
        return redirect('/login');
    }

}
