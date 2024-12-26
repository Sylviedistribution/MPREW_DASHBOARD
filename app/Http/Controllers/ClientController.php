<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clientsList = Clients::all();

        return view('clients/list', compact('clientsList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'mensurations' => 'required',
            'genre' => 'required'

        ]);

        $client = Clients::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'mensurations' => $request->mensurations,
            'genre' => $request->genre,
            'etat' => 1,
        ]);
        return redirect()->route('clients.list')->with('success', "Vous avez bien inscrit le client avec l'ID " . $client->id);

    }

    public function create()
    {
        return view('clients/create');
    }

    public function showMensurations(Clients $client)
    {
        $mensurations = $client->mensurations ?? null;
        // Décoder le JSON en un tableau associatif
        $dataArray = json_decode($mensurations, true);


        // Si $dataArray est vide, on crée des tableaux vides pour keys et values
        $keys = [];
        $values = [];

        if (!empty($dataArray)) {
            $keys = array_keys($dataArray);  // Récupère les clés du tableau
            $values = array_values($dataArray);  // Récupère les valeurs du tableau
        }

        return view('clients/mensurations', compact('keys', 'values'));
    }

    public function edit(Clients $client)
    {

        return view('clients.edit', compact('client'));

    }

    public function update(Request $request, Clients $client)
    {
        $request->validate([
            "username" => "required",
            "email" => "required",
            "password" => "required",
            "telephone" => "required",
            "adresse" => "required",
            "etat" => "required",
        ]);

        // Utilisez la méthode update pour mettre à jour le modèle directement
        $client->update($request->all());

        // Redirigez vers la page de liste des étudiants avec un message de succès
        return redirect()->route('clients.list')
            ->with('success', "Le client avec l'ID " . $client->id . "a été mis à jour avec succès.");
    }

    public function delete(Clients $client)
    {
        $client->delete();
    }


    public function filter(Request $request)
    {
        $clientsList = Clients::filterBy($request->username, $request->email, $request->genre, $request->etat);

        return view('clients.list', compact('clientsList'));
    }
}
