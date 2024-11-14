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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date'); // Champ pour la date de livraison
            $table->enum('statut', ['En attente', 'En cours', 'Livré', 'Annulé'])->default('En attente'); // Statut de la livraison
            $table->unsignedBigInteger('commande_id'); // Référence à la commande associée
            $table->timestamps();

            // Définir la clé étrangère
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
