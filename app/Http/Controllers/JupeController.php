<?php

namespace App\Http\Controllers;

use App\Models\Jupes;
use Illuminate\Http\Request;

class JupeController extends Controller
{

    public function index()
    {
        $jupesList = Jupes::all();

        return view('jupes/list', compact('jupesList'));    }


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
        $jupesList = Jupes::filterBy($request->nom, $request->dateInsertion);

        return view('jupes.list', compact('jupesList'));
    }
}
