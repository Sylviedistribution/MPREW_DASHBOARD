<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Coupe extends Controller
{
    public function index()
    {
        $coupes = Coupes::all();
        return response()->json($coupes, 200);
    }

}
