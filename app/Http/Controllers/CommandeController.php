<?php

namespace App\Http\Controllers;

use App\Models\Commandes;
use Illuminate\Http\Request;

class CommandeController extends Controller
{

    public function index()
    {
        $commandesList = Commandes::all();

        return view('commandes/list', compact('commandesList'));
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


    public function destroy(string $id)
    {
        //
    }

    public function filter(Request $request)
    {
        $commandesList = Commandes::filterBy($request->dateDebut, $request->dateFin, $request->total, $request->statut, $request->email);

        return view('commandes.list', compact('commandesList'));
    }
}
