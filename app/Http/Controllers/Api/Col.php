<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cols;
use Illuminate\Http\Request;

class Col extends Controller
{
    public function index()
    {
        $cols = Cols::all();
        return response()->json($cols, 200);
    }

}
