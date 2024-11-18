<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Manches;
use Illuminate\Http\Request;

class Manche extends Controller
{

    public function index()
    {
        $manches = Manches::all();
        return response()->json($manches, 200);
    }

}
