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
            $table->string('username',30); // Nom d'utilisateur
            $table->string('email',80)->unique(); // Email unique
            $table->string('password',70); // Mot de passe
            $table->string('telephone',20)->nullable(); // Téléphone, peut être nul
            $table->string('adresse',60)->nullable(); // Adresse, peut être nul
            $table->integer('etat',1)->default(1); // Etat, 1 pour actif par défaut
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
