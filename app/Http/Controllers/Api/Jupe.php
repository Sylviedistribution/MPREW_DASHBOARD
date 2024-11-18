<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jupes;
use Illuminate\Http\Request;

class Jupe extends Controller
{

    public function index()
    {
        $jupes = Jupes::all();
        return response()->json($jupes, 200);
    }
}
