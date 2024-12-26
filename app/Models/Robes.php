<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Robes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prix',
        'date',
        'colId',
        'coupeId',
        'mancheId',
        'jupeId',
        'tissuId',
        'clientId',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];


    // Define relationships if needed
    public function client()
    {
        return $this->belongsTo(Clients::class, 'clientId');
    }

    public function col()
    {
        return $this->belongsTo(Cols::class, 'colId');
    }

    public function coupe()
    {
        return $this->belongsTo(Coupes::class, 'coupeId');
    }

    public function manche()
    {
        return $this->belongsTo(Manches::class, 'mancheId');
    }

    public function jupe()
    {
        return $this->belongsTo(Jupes::class, 'jupeId');
    }

    public function tissu()
    {
        return $this->belongsTo(Tissues::class, 'tissuId');
    }

    public static function filterBy( $dateInsertion = null,  $client = null, $coupe = null, $col = null, $manche = null, $jupe = null, $tissu = null)
    {
        $query = Robes::query();

        if ($dateInsertion) {
            $query->where('created_at', 'like', '%' . $dateInsertion . '%');
        }

        if ($client) {
            $query->where('clientId', 'like', '%' . $client . '%');
        }

        if ($coupe) {
            $query->where('coupeId', 'like', '%' . $coupe . '%');
        }

        if ($col) {
            $query->where('colId', 'like', '%' . $col . '%');
        }

        if ($manche) {
            $query->where('mancheId', 'like', '%' . $manche . '%');
        }

        if ($jupe) {
            $query->where('jupeId', 'like', '%' . $jupe . '%');
        }

        if ($tissu) {
            $query->where('tissuId', 'like', '%' . $tissu . '%');
        }


        return $robesList = $query->paginate(10);
    }

    public function getName(): string
    {
        // Récupérer les objets associés
        $coupe = Coupes::find($this->coupeId);
        $col = Cols::find($this->colId);
        $manche = Manches::find($this->mancheId);
        $jupe = Jupes::find($this->jupeId);
        $tissu = Tissues::find($this->tissuId);


        // Construire le nom de la robe en fonction des éléments associés
        return implode('_', [
            $coupe ? $coupe->nom : '',
            $col ? $col->nom : '',
            $manche ? $manche->nom : '',
            $jupe ? $jupe->nom : '',
            $tissu ? $tissu->nom : ''
        ]);
    }
}
