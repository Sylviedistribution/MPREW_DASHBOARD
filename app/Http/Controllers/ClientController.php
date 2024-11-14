<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of txhe resource.
     */
    public function index()
    {
        $clientsList = Clients::all();

        return view('clients/list', compact('clientsList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients/create');

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
        $clientsList = Clients::filterBy($request->username, $request->email, $request->genre, $request->statut);

        return view('clients.list', compact('clientsList'));
    }
}
