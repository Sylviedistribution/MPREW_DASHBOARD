<?php

namespace App\Http\Controllers;

use App\Models\Jupes;
use Illuminate\Http\Request;

class JupeController extends Controller
{

    public function index()
    {
        $jupesList = Jupes::all();

        return view('jupes/list', compact('jupesList'));
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
            $imagePath = $image->store('imagesJupe', 'public'); // Utilisation d'un chemin spécifique
        } else {
            // Gérer l'erreur si le fichier n'est pas présent
            return back()->withErrors(['image' => 'Image non telechargée']);
        }

        $jupe = Jupes::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('jupes.list')
            ->with('success', "Vous avez bien ajouté la jupe avec l'ID " . $jupe->id);
    }

    public function create()
    {
        return view('jupes/create');
    }

    public function edit(Jupes $jupe)
    {
        return view('jupes.edit', compact('jupe'));
    }

    public function update(Request $request, Jupes $jupe)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|image' // L'image est facultative mais doit être valide si présente
        ]);

        // Gérer l'image si une nouvelle est fournie
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('imagesJupes', 'public'); //Enregistre la nouvelle image
        } else {
            $imagePath = $jupe->imagePath; // Conserve l'image existante si aucune nouvelle n'est fournie
        }

        // Met à jour le modèle avec les nouvelles données
        $jupe->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('jupes.list')
            ->with('success', "La jupe avec l'ID " . $jupe->id . " a été mise à jour avec succès.");
    }

    public function delete(Jupes $jupe)
    {
        $jupe->delete();

        return redirect()->route('jupes.list')
            ->with('success', "La jupe avec l'ID " . $jupe->id . " a été supprimée avec succès.");
    }


    public function filter(Request $request)
    {
        $jupesList = Jupes::filterBy($request->nom, $request->dateInsertion);

        return view('jupes.list', compact('jupesList'));
    }
}
