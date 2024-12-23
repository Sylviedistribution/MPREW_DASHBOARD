<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Clients  extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'telephone',
        'password',
        'genre',
        'etat',
    ];

    protected $casts = [
        'mensurations' => 'array',
    ];

    public static function filterBy( $username = null,  $email = null,  $genre = null,  $etat= null)
    {
        $query = Clients::query();

        if ($username) {
            $query->where('username', 'like', '%' . $username . '%');
        }

        if ($email) {
            $query->where('email', 'like', '%' . $email . '%');
        }

        if ($genre) {
            $query->where('genre', 'like', '%' . $genre . '%');
        }

        if ($etat) {
            $query->where('etat', 'like', '%'.$etat.'%');
        }

        return $clientsList = $query->paginate(10);
    }


}
