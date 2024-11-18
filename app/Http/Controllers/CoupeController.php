<?php

namespace App\Http\Controllers;

use App\Models\Coupes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoupeController extends Controller
{
    public function index()
    {
        $coupesList = Coupes::all();

        return view('coupes/list', compact('coupesList'));
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
            $imagePath = $image->store('imagesCoupe', 'public'); // Utilisation d'un chemin spécifique
        } else {
            // Gérer l'erreur si le fichier n'est pas présent
            return back()->withErrors(['image' => 'Image non telechargée']);
        }

        $coupe = Coupes::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('coupes.list')
            ->with('success', "Vous avez bien ajouté la coupe avec l'ID " . $coupe->id);
    }

    public function create()
    {
        return view('coupes/create');
    }

    public function edit(Coupes $coupe)
    {
        return view('coupes.edit', compact('coupe'));
    }

    public function update(Request $request, Coupes $coupe)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|image' // L'image est facultative mais doit être valide si présente
        ]);

        // Gérer l'image si une nouvelle est fournie
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('imagesCoupe', 'public'); //Enregistre la nouvelle image
        } else {
            $imagePath = $coupe->imagePath; // Conserve l'image existante si aucune nouvelle n'est fournie
        }

        // Met à jour le modèle avec les nouvelles données
        $coupe->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('coupes.list')
            ->with('success', "La coupe avec l'ID " . $coupe->id . " a été mis à jour avec succès.");
    }

    public function delete(Coupes $coupe)
    {
        $coupe->delete();

        return redirect()->route('coupes.list')
            ->with('success', "La coupe avec l'ID " . $coupe->id . " a été supprimé avec succès.");
    }

    public function filter(Request $request)
    {
        $coupesList = Coupes::filterBy($request->nom, $request->dateInsertion);

        return view('coupes.list', compact('coupesList'));
    }
}
