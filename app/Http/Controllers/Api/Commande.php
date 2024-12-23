<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
            'data' => [{"id": 11, "date": 2024 - 12 - 22, "total": 100, "statut": EN_ATTENTE, "clientId": 9, "artisanId": null, "created_at": 2024 - 12 - 22T19:31:27.000000Z, "updated_at": 2024 - 12 - 22T19:31:27.000000Z}]$commandes
        ], 200)
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
