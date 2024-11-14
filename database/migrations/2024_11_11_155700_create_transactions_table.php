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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Entrée', 'Sortie']);
            $table->double('montant');
            $table->dateTime('date');
            $table->unsignedBigInteger('artisan_id');
            $table->unsignedBigInteger('paiement_id');
            $table->unsignedBigInteger('comptesequestre_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('artisan_id')->references('id')->on('artisans')->onDelete('cascade');
            $table->foreign('paiement_id')->references('id')->on('paiements')->onDelete('cascade');
            $table->foreign('comptesequestre_id')->references('id')->on('comptesequestres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
