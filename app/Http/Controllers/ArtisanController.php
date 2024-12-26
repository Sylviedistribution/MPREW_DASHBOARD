<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\Artisans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ArtisanController extends Controller
{

    public function index()
    {
        $artisansList = Artisans::all();

        return view('artisans/list', compact('artisansList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',

        ]);

        $artisan = Artisans::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'etat' => 1,
        ]);
        return redirect()->route('artisans.list')->with('success', "Vous avez bien inscrit l'artisan avec l'ID " . $artisan->id);

    }

    public function create()
    {
        return view('artisans/create');
    }

    public function edit(Artisans $artisan)
    {

        return view('artisans.edit', compact('artisan'));

    }

    public function update(Request $request, Artisans $artisan)
    {
        $request->validate([
            "username" => "required",
            "email" => "required",
            "adresse" => "required",
            "etat" => "required",
        ]);

        // Utilisez la méthode update pour mettre à jour le modèle directement
        $artisan->update($request->all());

        Mail::to($request->email)->send(new TestEmail());


        return redirect()->route('artisans.list')
            ->with('success', "L'artisan avec l'ID " . $artisan->id . "a été mis à jour avec succès.");
    }

    public function delete(Artisans $artisan)
    {
        $artisan->delete();
    }

    public function filter(Request $request)
    {
        $artisansList = Artisans::filterBy($request->username, $request->email, $request->telephone, $request->etat);

        return view('artisans.list', compact('artisansList'));
    }
}
