<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cols;
use Illuminate\Http\Request;

class Model3d extends Controller
{
    public function index()
    {
        $cols = Cols::all();
        return response()->json($cols, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('imagesCol', 'public');
        } else {
            return response()->json(['error' => 'Invalid image'], 400);
        }

        $col = Cols::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return response()->json($col, 201);
    }

    public function show($id)
    {
        $col = Cols::find($id);

        if (!$col) {
            return response()->json(['error' => 'Col not found'], 404);
        }

        return response()->json($col, 200);
    }

    public function update(Request $request, $id)
    {
        $col = Cols::find($id);

        if (!$col) {
            return response()->json(['error' => 'Col not found'], 404);
        }

        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Supprime l'ancienne image si nécessaire
            if ($col->imagePath) {
                Storage::disk('public')->delete($col->imagePath);
            }

            $imagePath = $request->file('image')->store('imagesCol', 'public');
        } else {
            $imagePath = $col->imagePath;
        }

        $col->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return response()->json($col, 200);
    }

    public function destroy($id)
    {
        $col = Cols::find($id);

        if (!$col) {
            return response()->json(['error' => 'Col not found'], 404);
        }

        if ($col->imagePath) {
            Storage::disk('public')->delete($col->imagePath);
        }

        $col->delete();

        return response()->json(['message' => 'Col deleted successfully'], 200);
    }
}
