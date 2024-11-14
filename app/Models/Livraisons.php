<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraisons extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'statut',
        'commande_id',
    ];

    // Relation vers le modèle Commande
    public function commande()
    {
        return $this->belongsTo(Commandes::class, 'commande_id');
    }

    public static function filterBy($date = null, $statut = null, $commandeId = null)
    {
        $query = self::query();

        if ($date) {
            $query->whereDate('created_at', $date);
        }

        if ($statut) {
            $query->where('statut', 'like', '%' . $statut . '%');
        }

        if ($commandeId) {
            $query->where('commandeId', 'like', '%' . $commandeId . '%');
        }

        return $query->paginate(10);
    }
}
