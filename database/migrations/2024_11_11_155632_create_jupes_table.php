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
        Schema::create('jupes', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // champ de l'élément de base
            $table->string('imagePath')->nullable(); // champ de l'élément de base
            $table->text('description')->nullable(); // champ de l'élément de base
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jupes');
    }
};
