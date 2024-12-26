<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Cols;
use App\Models\Coupes;
use App\Models\Jupes;
use App\Models\Manches;
use App\Models\Robes;
use App\Models\Tissues;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RobeController extends Controller
{

    public function index()
    {
        $robesList = Robes::all();
        $clients = Clients::all();
        $coupes = Coupes::all();
        $cols = Cols::all();
        $manches = Manches::all();
        $jupes = Jupes::all();
        $tissus = Tissues::all();

        return view('robes/list', compact('robesList', 'clients', 'coupes', 'cols', 'manches', 'jupes', 'tissus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coupeId' => 'required|numeric',
            'colId' => 'required|numeric',
            'mancheId' => 'required|numeric',
            'jupeId' => 'required|numeric',
            'tissuId' => 'required|numeric',
            'clientId' => 'required|numeric'
        ]);

        $prix = 40000;

        $robe = Robes::create([
            'date' => Carbon::now(),
            'prix' => $prix,
            'coupeId' => $request->coupeId,
            'colId' => $request->colId,
            'mancheId' => $request->mancheId,
            'jupeId' => $request->jupeId,
            'tissuId' => $request->tissuId,
            'clientId' => $request->clientId
        ]);


        // Récupérer le nom généré par la méthode getName()
        $nom = $robe->getName();
        // Attribuer le nom à l'objet robe et le sauvegarder
        $robe->nom = $nom;
        $robe->save();

        return redirect()->route('robes.list')->with('success', "Vous avez bien créé la robe " . $robe->id);

    }

    public function create()
    {
        $clientsList = Clients::all();
        $coupesList = Coupes::all();
        $colsList = Cols::all();
        $manchesList = Manches::all();
        $jupesList = Jupes::all();
        $tissusList = Tissues::all();
        return view('robes/create', compact('clientsList', 'coupesList', 'colsList', 'manchesList', 'jupesList', 'tissusList'));
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
        $robesList = Robes::filterBy($request->dateInsertion, $request->client, $request->coupe, $request->col, $request->manche, $request->jupe, $request->tissu);

        $clients = Clients::all();
        $coupes = Coupes::all();
        $cols = Cols::all();
        $manches = Manches::all();
        $jupes = Jupes::all();
        $tissus = Tissues::all();

        return view('robes/list', compact('robesList', 'clients', 'coupes', 'cols', 'manches', 'jupes', 'tissus'));
    }
}
