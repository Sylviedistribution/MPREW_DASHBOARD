<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'date',
        'estLu',
    ];

    // Méthode pour marquer la notification comme lue
    public function marquerCommeLue()
    {
        $this->estLu = true;
        $this->save();
    }
}
