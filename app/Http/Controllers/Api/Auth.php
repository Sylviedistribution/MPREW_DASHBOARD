<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Auth extends Controller
{
    // Connexion via API (connexion d'un client)
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Authentification
        $client = Clients::where('email', $request->email)->first();

        if ($client && Hash::check($request->password, $client->password)) {
            $token = $client->createToken('ClientToken')->plainTextToken;

            return response()->json([
                'message' => 'Connexion réussie.',
                'token' => $token,
                'client_id' => $client->id,
            ], 200);
        }

        return response()->json([
            'message' => 'Identifiants incorrects.',
        ], 401);
    }


    // Inscription via API (création d'un client)
    public function register(Request $request)
    {
        // Validation des données d'entrée
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|string|min:6',
            'genre' => 'required', // Assurez-vous que le champ password_confirmation est présent dans la requête
        ]);

        // Créer un nouveau client
        $client = Clients::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hacher le mot de passe avant de le sauvegarder
            'genre' => $request->genre,
            'etat' => 1
        ]);

        // Générer un token pour le client
        $token = $client->createToken('ClientToken')->plainTextToken;

        // Retourner une réponse JSON avec le token
        return response()->json([
            'message' => 'Inscription réussie.',
            'token' => $token
        ], 201);
    }

    // Déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Déconnexion réussie.',
        ], 200);
    }
}
