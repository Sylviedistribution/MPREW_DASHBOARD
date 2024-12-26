<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Statut;

class Commandes extends Model
{
    use HasFactory;

    public const STATUTS = [
        'TERMINE',
        'ANNULEE',
    ];

    // Déclaration des valeurs ENUM comme constante
    protected $fillable = [
        'date',
        'total',
        'statut',
        'clientId',
        'artisanId'
    ];

    // Méthode pour récupérer les valeurs ENUM

    public static function getStatuts()
    {
        return self::STATUTS;
    }

    // Relation avec le modèle Client

    public static function filterBy($dateDebut = null, $dateFin = null, $total = null, $statut = null, $genre = null)
    {
        $query = Commandes::query();

        if ($dateDebut) {
            $query->whereDate('created_at', '>=', $dateDebut);
        }

        if ($dateFin) {
            $query->whereDate('created_at', '<=', $dateFin);
        }

        if ($total) {
            $query->where('total', '<=', $total);
        }

        if ($statut) {
            $query->where('statut', 'like', '%' . $statut . '%');
        }

        if ($genre) {
            // Joindre la table clients pour filtrer les commandes par email du client
            $query->where('genre', 'like', '%' . $genre . '%');
        }

        return $query->paginate(10);
    }

    public function client()
    {
        return $this->belongsTo(Clients::class, 'clientId');
    }

    public function commandeArticle()
    {
        return $this->hasMany(CommandeArticles::class, 'commandeId', 'id');
    }

    public function dateFin()
    {
        return Carbon::now()->addWeeks(2)->next(CarbonInterface::MONDAY)->format('Y-m-d');

    }
}
