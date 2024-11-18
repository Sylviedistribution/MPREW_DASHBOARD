<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Cols;
use App\Models\Coupes;
use App\Models\Jupes;
use App\Models\Manches;
use App\Models\Robes;
use App\Models\Tissues;
use Carbon\Carbon;
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
        $clientsList = Clients::all();
        $coupesList = Coupes::all();
        $colsList = Cols::all();
        $manchesList = Manches::all();
        $jupesList = Jupes::all();
        $tissusList = Tissues::all();
        return view('robes/create',compact('clientsList','coupesList','colsList','manchesList','jupesList','tissusList'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'coupeId' => 'required|numeric',
            'colId' => 'required|numeric',
            'mancheId' => 'required|numeric',
            'jupeId' => 'required|numeric',
            'tissuId' => 'required|numeric',
            'clientId' => 'required|numeric'
        ]);

        $robe = Robes::create([
            'date' => Carbon::now(),
            'coupeId' => $request->coupeId,
            'colId' => $request->colId,
            'mancheId' => $request->mancheId,
            'jupeId' => $request->jupeId,
            'tissuId' => $request->tissuId,
            'clientId' => $request->clientId
        ]);

        return redirect()->route('robes.list')->with('success', "Vous avez bien créé la robe " . $robe->id);

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
