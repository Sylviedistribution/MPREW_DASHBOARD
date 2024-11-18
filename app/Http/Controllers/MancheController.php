<?php

namespace App\Http\Controllers;

use App\Models\Manches;
use Illuminate\Http\Request;

class MancheController extends Controller
{

    public function index()
    {
        $manchesList = Manches::all();

        return view('manches/list', compact('manchesList'));
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
            $imagePath = $image->store('imagesManche', 'public'); // Utilisation d'un chemin spécifique
        } else {
            // Gérer l'erreur si le fichier n'est pas présent
            return back()->withErrors(['image' => 'Image non telechargée']);
        }

        $manche = Manches::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('manches.list')
            ->with('success', "Vous avez bien ajouté la manche avec l'ID " . $manche->id);
    }

    public function create()
    {
        return view('manches/create');
    }

    public function edit(Manches $manche)
    {
        return view('manches.edit', compact('manche'));
    }

    public function update(Request $request, Manches $manche)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|image' // L'image est facultative mais doit être valide si présente
        ]);

        // Gérer l'image si une nouvelle est fournie
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('imagesManches', 'public'); //Enregistre la nouvelle image
        } else {
            $imagePath = $manche->imagePath; // Conserve l'image existante si aucune nouvelle n'est fournie
        }

        // Met à jour le modèle avec les nouvelles données
        $manche->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('manches.list')
            ->with('success', "La manche avec l'ID " . $manche->id . " a été mise à jour avec succès.");
    }

    public function delete(Manches $manche)
    {
        $manche->delete();

        return redirect()->route('manches.list')
            ->with('success', "La manche avec l'ID " . $manche->id . " a été supprimée avec succès.");
    }
    public function filter(Request $request)
    {
        $manchesList = Manches::filterBy($request->nom, $request->dateInsertion);

        return view('manches.list', compact('manchesList'));
    }
}
