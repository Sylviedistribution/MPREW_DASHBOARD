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
        $colsList = Cols::filterBy($request->nom, $request->dateInsertion);

        return view('cols.list', compact('colsList'));
    }
}
