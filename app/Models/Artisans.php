<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisans extends Model
{
    use HasFactory;


    public static function filterBy($username = null, $email = null, $telephone = null, $statut = null){
        $query = Artisans::query();

        if ($username) {
            $query->where('username', 'like', '%' . $username . '%');
        }

        if ($email) {
            $query->where('email', 'like', '%' . $email . '%');
        }


        if ($telephone) {
            $query->where('telephone', 'like', '%'.$telepshone.'%');
        }

        $artisansList = $query->paginate(10);

        return $artisansList;

    }
}
