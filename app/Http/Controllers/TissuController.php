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
            $tissuesList = Tissues::filterBy($request->nom, $request->dateInsertion);

        return view('tissues.list', compact('tissuesList'));
    }
}
