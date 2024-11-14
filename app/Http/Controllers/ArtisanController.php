<?php

namespace App\Http\Controllers;

use App\Models\Artisans;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artisansList = Artisans::all();

        return view('artisans/list', compact('artisansList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artisans/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filter(Request $request)
    {
        $artisansList = Artisans::filterBy($request->username, $request->email, $request->telephone, $request->statut);

        return view('artisans.list', compact('artisansList'));
    }
}
