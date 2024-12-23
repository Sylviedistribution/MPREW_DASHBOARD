<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Client extends Controller
{
    public function index()
    {
        // Vérifier si le client est authentifié
        $client = auth('sanctum')->user();

        if (!$client) {
            return response()->json([
                'success' => false,
                'message' => 'Client non authentifié'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Client récupéré avec succès',
            'data' => [
                'username' => $client->username,
                'email' => $client->email,
                'telephone' => $client->telephone,
                'genre' => $client->genre,
                'adresse' => $client->adresse,
            ]], 201);
    }


    public function getMensuration()
    {
        $client = auth('sanctum')->user();

        if (!$client) {
            return response()->json([
                'success' => false,
                'message' => 'Client non authentifié'
            ], 401);
        }


        // Récupérer et décoder les mensurations du client
        $mensurations = is_string($client->mensurations)
            ? json_decode($client->mensurations, true)
            : $client->mensurations;

        // Vérifier si les mensurations sont valides (tableau associatif)
        if (!is_array($mensurations)) {
            return response()->json([
                'success' => false,
                'message' => 'Les mensurations du client ne sont pas valides.',
            ], 400);
        }

        // Convertir et retourner les mensurations sous forme de tableau
        return response()->json([
            'success' => true,
            'message' => 'Mensurations récupérées avec succès',
            'mensurations' => [
                'tourCou' => (string)($mensurations['tourCou'] ?? ''),
                'largeurEpaule' => (string)($mensurations['largeurEpaule'] ?? ''),
                'tourPoitrine' => (string)($mensurations['tourPoitrine'] ?? ''),
                'hauteurPoitrine' => (string)($mensurations['hauteurPoitrine'] ?? ''),
                'tourDessousPoitrine' => (string)($mensurations['tourDessousPoitrine'] ?? ''),
                'tourTaille' => (string)($mensurations['tourTaille'] ?? ''),
                'tourTailleHaute' => (string)($mensurations['tourTailleHaute'] ?? ''),
                'tourHanche' => (string)($mensurations['tourHanche'] ?? ''),
                'tourBras' => (string)($mensurations['tourBras'] ?? ''),
                'longueurBras' => (string)($mensurations['longueurBras'] ?? ''),
                'longueurManches' => (string)($mensurations['longueurManches'] ?? ''),
                'tourPoignet' => (string)($mensurations['tourPoignet'] ?? ''),
                'longueurDos' => (string)($mensurations['longueurDos'] ?? ''),
                'longueurRobe' => (string)($mensurations['longueurRobe'] ?? ''),
            ],
        ], 200);
    }


    public function update(Request $request)
    {
        // Vérifier si le client est authentifié
        $client = auth('sanctum')->user();

        if (!$client) {
            return response()->json([
                'success' => false,
                'message' => 'Client non authentifié'
            ], 401);
        }
        // Validation des données à modifier
        $request->validate([
            'username' => 'nullable|string',
            'email' => 'nullable|email', // Assurez-vous que l'email est valide s'il est présent
            'telephone' => 'nullable|telephone', // Assurez-vous que l'email est valide s'il est présent
            'genre' => 'nullable|string', // Assurez-vous que l'email est valide s'il est présent
            'adresse' => 'nullable|string',
            'mensurations' => 'nullable'
            // Ajoutez d'autres champs selon les informations que vous souhaitez modifier
        ]);


        // Mise à jour des informations
        if ($request->has('username')) {
            $client->username = $request->input('username');
        }

        if ($request->has('email')) {
            $client->email = $request->input('email');
        }

        if ($request->has('genre')) {
            $client->genre = $request->input('genre');
        }

        if ($request->has('adresse')) {
            $client->adresse = $request->input('adresse');
        }

        if ($request->has('mensurations')) {
            $client->mensurations = json_encode($request->input('mensurations'));
        }
        // Sauvegarde des modifications dans la base de données
        $client->save();

        // Retour d'une réponse avec succès
        return response()->json([
            'message' => 'Informations mises à jour avec succès.',
            'client' => $client,
        ], 200);
    }

    public function destroy(string $id)
    {
        //
    }
}
