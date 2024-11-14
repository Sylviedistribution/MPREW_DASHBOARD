<?php

namespace App\Http\Controllers;

use App\Models\Livraisons;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    public function index()
    {
        $livraisonsList = Livraisons::all();

        return view('livraisons/list', compact('livraisonsList'));
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
        $livraisonsList = Livraisons::filterBy($request->date, $request->statut, $request->commadeId);

        return view('livraisons.list', compact('livraisonsList'));
    }
}
