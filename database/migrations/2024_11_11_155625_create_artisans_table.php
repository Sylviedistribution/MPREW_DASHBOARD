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
        Schema::create('artisans', function (Blueprint $table) {
            $table->id(); // Champ 'id' auto-incrémenté
            $table->string('username'); // Nom d'utilisateur
            $table->string('email')->unique(); // Email unique
            $table->string('password'); // Mot de passe
            $table->string('telephone')->nullable(); // Téléphone, peut être nul
            $table->string('adresse')->nullable(); // Adresse, peut être nul
            $table->integer('etat')->default(1); // Etat, 1 pour actif par défaut
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artisans');
    }
};
