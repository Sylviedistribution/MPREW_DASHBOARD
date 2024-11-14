<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'adresse',
        'mensurations',
        'genre',
        'etat',
    ]
    ;

    public static function filterBy( $username = null,  $email = null,  $genre = null,  $statut= null)
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

        if ($statut) {
            $query->where('statut', 'like', $statut);
        }

        return $clientsList = $query->paginate(10);
    }


}
