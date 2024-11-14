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
        $coupesList = Coupes::filterBy($request->nom, $request->dateInsertion);

        return view('coupes.list', compact('coupesList'));
    }
}
