<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'montant',
        'date',
        'artisanId',
        'paiementId',
        'comptesequestreId',
    ];

    // Relation avec Artisan
    public function artisan()
    {
        return $this->belongsTo(Artisan::class, 'artisanId');
    }

    // Relation avec Paiement
    public function paiement()
    {
        return $this->belongsTo(Paiement::class, 'paiementId');
    }

    // Relation avec CompteSéquestre
    public function comptesequestre()
    {
        return $this->belongsTo(CompteSequestre::class, 'comptesequestreId');
    }

    public function filter(Request $request)
    {
        $request->validate([
            'montant' => 'numeric|nullable',
            'date' => 'date|nullable',
            'artisanId' => 'integer|nullable',
            'paiementId' => 'integer|nullable',
            'comptesequestreId' => 'integer|nullable',
        ]);

        $transactions = Transaction::filterBy(
            $request->type,
            $request->montant,
            $request->date,
            $request->artisanId,
            $request->paiementId,
            $request->comptesequestreId
        );

        return view('transactions.list', compact('transactions'));
    }


}
