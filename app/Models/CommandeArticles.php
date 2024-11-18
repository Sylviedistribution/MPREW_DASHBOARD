<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeArticles extends Model
{
    use HasFactory;

    protected $fillable = [
        'robeId',
        'quantite',
        'prixUnitaire',
        'commandeId',
    ];

    // Relation avec la Robe
    public function robe()
    {
        return $this->belongsTo(Robes::class, 'robeId');
    }

    // Relation avec la Commande
    public function commande()
    {
        return $this->belongsTo(Commandes::class, 'commandeId');
    }


    public static function filterBy($quantite = null, $prixUnitaire = null)
    {
        $query = CommandeArticles::query();

        if ($quantite) {
            $query->where('quantite', '=', $quantite);
        }

        if ($prixUnitaire) {
            $query->where('$prixUnitaire', '=', $prixUnitaire);
        }

        return $query->paginate(10);
    }
}
