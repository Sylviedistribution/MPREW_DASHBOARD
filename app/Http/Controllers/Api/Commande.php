<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CommandeArticles;
use App\Models\Commandes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Commande extends Controller
{

    public function index()
    {
        $client = auth('sanctum')->user();

        Log::info('Client authentifié : ', [$client]);

        // Récupérer les robes du client
        $commandes = Commandes::where('clientId', $client->id)->get(); // Récupère les commandes associées au client

        if ($commandes->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Aucune commande enregistrée'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $commandes
        ], 200);
    }


    public function store(Request $request)
    {

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
