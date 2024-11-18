<?php

namespace App\Http\Controllers;

use App\Models\Tissues;
use Illuminate\Http\Request;

class TissuController extends Controller
{

    public function index()
    {
        $tissusList = Tissues::all();

        return view('tissus/list', compact('tissusList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $image = $request->image;
        //Creer le chemin de l'image
        if ($image && !$image->getError()) {
            $imagePath = $image->store('imagesTissu', 'public'); // Utilisation d'un chemin spécifique
        } else {
            // Gérer l'erreur si le fichier n'est pas présent
            return back()->withErrors(['image' => 'Image non telecharger']);
        }

        $tissu = Tissues::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('tissus.list')
            ->with('success', "Vous avez bien ajouté le tissu avec l'ID " . $tissu->id);
    }

    public function create()
    {
        return view('tissus/create');
    }

    public function edit(Tissues $tissu)
    {
        return view('tissus.edit', compact('tissu'));
    }

    public function update(Request $request, Tissues $tissu)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|image' // L'image est facultative mais doit être valide si présente
        ]);

        // Gérer l'image si une nouvelle est fournie
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('imagesTissu', 'public'); //Enregistre la nouvelle image
        } else {
            $imagePath = $tissu->imagePath; // Conserve l'image existante si aucune nouvelle n'est fournie
        }

        // Met à jour le modèle avec les nouvelles données
        $tissu->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('tissus.list')
            ->with('success', "Le tissu avec l'ID " . $tissu->id . " a été mis à jour avec succès.");
    }

    public function delete(Tissues $tissu)
    {
        $tissu->delete();

        return redirect()->route('tissus.list')
            ->with('success', "Le tissu avec l'ID " . $tissu->id . " a été supprimé avec succès.");
    }

    public function filter(Request $request)
    {
            $tissuesList = Tissues::filterBy($request->nom, $request->dateInsertion);

        return view('tissues.list', compact('tissuesList'));
    }
}
