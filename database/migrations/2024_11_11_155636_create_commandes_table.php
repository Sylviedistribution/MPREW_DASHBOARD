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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->double('total', 8, 2);
            $table->enum('statut', ['EN_ATTENTE', 'VALIDÉ', 'ANNULÉ', 'TERMINÉ', 'PAYÉ', 'NON_PAYÉ', 'LIVRÉ'])->default('EN_ATTENTE');
            $table->unsignedBigInteger('clientId');
            $table->unsignedBigInteger('artisanId');
            $table->timestamps();

            // Foreign key constraint linking to clients table
            $table->foreign('clientId')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('artisanId')->references('id')->on('artisans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
