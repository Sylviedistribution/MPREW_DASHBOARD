<?php

namespace App\Http\Controllers;

use App\Models\Paiements;
use Illuminate\Http\Request;

class PaiementController extends Controller
{

    public function index()
    {
        $paiementsList = Paiements::all();

        return view('paiements/list', compact('paiementsList'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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

    public function filter(Request $request)
    {
        $paiementsList = Paiements::filterBy($request->dateDebut, $request->dateFin, $request->montant, $request->commandeId, $request->clientId);

        return view('paiements.list', compact('paiementsList'));
    }

    public function destroy(string $id)
    {
        //
    }
}
