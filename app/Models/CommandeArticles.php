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
        'prixunitaire',
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
}
