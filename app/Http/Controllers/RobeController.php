<?php

namespace App\Http\Controllers;

use App\Models\Robes;
use Illuminate\Http\Request;

class RobeController extends Controller
{

    public function index()
    {
        $robesList = Robes::all();

        return view('robes/list', compact('robesList'));
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
        $robesList = Robes::filterBy($request->dateInsertion, $request->clientId);

        return view('robes.list', compact('robesList'));
    }
}
