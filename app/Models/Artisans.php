<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Artisans extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $protected = ['email','password'];

    public static function filterBy($username = null, $email = null, $telephone = null, $etat = null){
        $query = Artisans::query();

        if ($username) {
            $query->where('username', 'like', '%' . $username . '%');
        }

        if ($email) {
            $query->where('email', 'like', '%' . $email . '%');
        }


        if ($telephone) {
            $query->where('telephone', 'like', '%'.$telephone.'%');
        }

        if ($etat) {
            $query->where('etat', 'like', '%'.$etat.'%');
        }

        $artisansList = $query->paginate(10);

        return $artisansList;

    }
}
