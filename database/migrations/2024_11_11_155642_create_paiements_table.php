<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paiements', function (Blueprint $table) {
        $table->id();
        $table->double('montant', 8, 2);
        $table->dateTime('date');
        $table->enum('statut', ['EN_ATTENTE', 'VALIDÉ', 'ANNULÉ', 'TERMINÉ', 'PAYÉ', 'NON_PAYÉ', 'LIVRÉ']);
        $table->unsignedBigInteger('commande_id');
        $table->unsignedBigInteger('client_id');
        $table->timestamps();

        // Foreign key constraints
        $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
        $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
