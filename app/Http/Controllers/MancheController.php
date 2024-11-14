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
        $manchesList = Manches::filterBy($request->nom, $request->dateInsertion);

        return view('manches.list', compact('manchesList'));
    }
}
