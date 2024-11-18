<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Robes extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public static function filterBy(  $dateInsertion = null,  $clientId = null)
    {
        $query = Robes::query();

        if ($dateInsertion) {
            $query->where('created_at', 'like', '%' . $dateInsertion . '%');
        }

        if ($clientId) {
            $query->where('clientId', 'like', '%' . $clientId . '%');
        }


        return $robesList = $query->paginate(10);
    }

    public function imageUrl(): string {
        //Generer l'url de l'image
        return Storage::url($this->imagePath);
    }
}
