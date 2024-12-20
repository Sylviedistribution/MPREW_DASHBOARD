<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cols;
use App\Models\Coupes;
use App\Models\Jupes;
use App\Models\Manches;
use App\Models\Robes;
use App\Models\Tissues;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Robe extends Controller
{
    // Liste des robes
    public function index()
    {
        // Vérifier si l'utilisateur est authentifié
        $client = auth('sanctum')->user();

        Log::info('Client authentifié : ', [$client]);

        // Récupérer les robes du client
        $robes = Robes::where('clientId', $client->id)->get(); // Récupère les robes associées au client


        if ($robes->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Aucune robe trouvée pour ce client'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $robes
        ], 200);
    }


// Sauvegarder une nouvelle robe

    public function store(Request $request)
    {
        // Vérifier si le client est authentifié
        $client = auth('sanctum')->user();

        if (!$client) {
            return response()->json([
                'success' => false,
                'message' => 'Client non authentifié'
            ], 401);
        }

        $prix = 100;

        // Validation des données
        $request->validate([
            'coupe' => 'required',
            'col' => 'required',
            'manche' => 'required',
            'jupe' => 'required',
            'tissu' => 'required',
        ]);

        $coupeId = Coupes::where('nom','like', '%' . $request->coupe . '%')->first()?->id;;
        $colId = Cols::where('nom','like', '%' . $request->col . '%')->first()?->id;
        $mancheId = Manches::where('nom','like', '%' . $request->manche . '%')->first()?->id;
        $jupeId = Jupes::where('nom','like', '%' . $request->jupe . '%')->first()?->id;
        $tissuId = Tissues::where('nom','like', '%' . $request->tissu . '%')->first()?->id;

        // Création de la robe
        $robe = Robes::create([
            'date' => Carbon::now(),
            'prix' => $prix,
            'coupeId' => $coupeId,
            'colId' => $colId,
            'mancheId' => $mancheId,
            'jupeId' => $jupeId,
            'tissuId' => $tissuId,
            'clientId' => $client->id, // Lier au client authentifié
        ]);

        // Récupérer le nom généré par la méthode getName()
        $nom = $robe->getName();
        // Attribuer le nom à l'objet robe et le sauvegarder
        $robe->nom = $nom;
        $robe->save();

        return response()->json([
            'success' => true,
            'message' => 'Robe créée avec succès',
            'data' => $robe
        ], 201);
    }

}
