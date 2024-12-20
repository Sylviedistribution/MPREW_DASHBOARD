<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commandes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Commande extends Controller
{

    public function index()
    {
        $client = auth('sanctum')->user();

        Log::info('Client authentifié : ', [$client]);

        // Récupérer les robes du client
        $commande = Commandes::where('clientId', $client->id)->get(); // Récupère les robes associées au client


        if ($commande->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Aucune commande enregistré'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $commande
        ], 200);    }


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
