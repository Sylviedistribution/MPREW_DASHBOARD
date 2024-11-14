<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manches extends ElementRobes
{
    use HasFactory;

    public static function filterBy( $nom = null,  $dateInsertion = null)
    {
        $query = Manches::query();

        if ($nom) {
            $query->where('nom', 'like', '%' . $nom . '%');
        }

        if ($dateInsertion) {
            $query->where('created_at', 'like', '%' . $dateInsertion . '%');
        }


        return $query->paginate(10);
    }
}
