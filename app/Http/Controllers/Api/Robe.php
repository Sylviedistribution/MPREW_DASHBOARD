<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Robes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Robe extends Controller
{
    // Liste des robes
    public function index()
    {
        $robes = Robes::all();
        return response()->json([
            'success' => true,
            'data' => $robes
        ], 200);
    }

    // Sauvegarder une nouvelle robe
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'coupeId' => 'required|numeric|exists:coupes,id',
            'colId' => 'required|numeric|exists:cols,id',
            'mancheId' => 'required|numeric|exists:manches,id',
            'jupeId' => 'required|numeric|exists:jupes,id',
            'tissuId' => 'required|numeric|exists:tissues,id',
            'clientId' => 'required|numeric|exists:clients,id'
        ]);

        // Création de la robe
        $robe = Robes::create([
            'date' => Carbon::now(),
            'coupeId' => $request->coupeId,
            'colId' => $request->colId,
            'mancheId' => $request->mancheId,
            'jupeId' => $request->jupeId,
            'tissuId' => $request->tissuId,
            'clientId' => $request->clientId
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Robe créée avec succès',
            'data' => $robe
        ], 201);
    }
}
