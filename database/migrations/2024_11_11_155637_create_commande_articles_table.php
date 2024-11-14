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
        Schema::create('commandearticles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('robeId')->constrained('robes')->onDelete('cascade');
            $table->integer('quantite')->unsigned();
            $table->double('prixunitaire', 8, 2);
            $table->foreignId('commandeId')->constrained('commandes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_articles');
    }
};
