<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cols extends ElementRobes
{
    use HasFactory;

    public static function filterBy( $nom = null,  $dateInsertion = null)
    {
        $query = Cols::query();

        if ($nom) {
            $query->where('nom', 'like', '%' . $nom . '%');
        }

        if ($dateInsertion) {
            $query->where('created_at', '=', '%' . $dateInsertion . '%');
        }


        return $query->paginate(10);
    }

    public function imageUrl(): string {
        //Generer l'url de l'image
        return Storage::url($this->imagePath);
    }
}
