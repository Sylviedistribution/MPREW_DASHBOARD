<?php

namespace App\Http\Controllers;

use App\Models\Cols;
use Illuminate\Http\Request;

class ColController extends Controller
{
    public function index()
    {
        $colsList = Cols::all();

        return view('cols/list', compact('colsList'));
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
            $imagePath = $image->store('imagesCol', 'public'); // Utilisation d'un chemin spécifique
        } else {
            // Gérer l'erreur si le fichier n'est pas présent
            return back()->withErrors(['image' => 'Image non telecharger']);
        }

        $col = Cols::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('cols.list')
            ->with('success', "Vous avez bien ajouté le col avec l'ID " . $col->id);
    }

    public function create()
    {
        return view('cols/create');
    }

    public function edit(Cols $col)
    {
        return view('cols.edit', compact('col'));
    }

    public function update(Request $request, Cols $col)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|image' // L'image est facultative mais doit être valide si présente
        ]);

        // Gérer l'image si une nouvelle est fournie
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('imagesCol', 'public'); //Enregistre la nouvelle image
        } else {
            $imagePath = $col->imagePath; // Conserve l'image existante si aucune nouvelle n'est fournie
        }

        // Met à jour le modèle avec les nouvelles données
        $col->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('cols.list')
            ->with('success', "Le col avec l'ID " . $col->id . " a été mis à jour avec succès.");
    }

    public function delete(Cols $col)
    {
        $col->delete();

        return redirect()->route('cols.list')
            ->with('success', "Le col avec l'ID " . $col->id . " a été supprimé avec succès.");
    }

    public function filter(Request $request)
    {
        $colsList = Cols::filterBy($request->nom, $request->dateInsertion);

        return view('cols.list', compact('colsList'));
    }
}
