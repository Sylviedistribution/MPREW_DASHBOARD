<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiements extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'montant', 'commandeId', 'clientId'];

    public static function filterBy($dateDebut = null, $dateFin = null, $montant = null, $commandeId = null, $clientId = null)
    {
        $query = self::query();

        if ($dateDebut) {
            $query->whereDate('created_at', '>=', $dateDebut);
        }

        if ($dateFin) {
            $query->whereDate('created_at', '<=', $dateFin);
        }

        if ($montant) {
            $query->where('montant', '>=', $montant);
        }

        if ($commandeId) {
            $query->where('commandeId', 'like', '%' . $commandeId . '%');
        }

        if ($clientId) {
            $query->where('clientId', 'like', '%' . $clientId . '%');
        }

        return $query->paginate(10);
    }
}
