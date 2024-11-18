<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Statut;

class Commandes extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'total',
        'statut',
        'clientId',
    ];

    // Relation avec le modèle Client
    public function client()
    {
        return $this->belongsTo(Clients::class, 'clientId');
    }

    public static function filterBy($dateDebut = null, $dateFin = null, $total = null, $statut = null, $email = null)
    {
        $query = Commandes::query();

        if ($dateDebut) {
            $query->whereDate('created_at', '>=', $dateDebut);
        }

        if ($dateFin) {
            $query->whereDate('created_at', '<=', $dateFin);
        }

        if ($total) {
            $query->where('total', '>=', $total);
        }

        if ($statut) {
            $query->where('statut', 'like', '%' . $statut . '%');
        }

        if ($email) {
            // Joindre la table clients pour filtrer les commandes par email du client
            $query->whereHas('client', function ($q) use ($email) {
                $q->where('email', $email);
            });
        }

        return $query->paginate(10);
    }

}
