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
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // id (auto-incremented primary key)
            $table->string('username'); // username
            $table->string('email')->unique(); // email, unique
            $table->string('password'); // password
            $table->string('adresse')->nullable(); // adresse, optional
            $table->json('mensurations')->nullable(); // mensurations, stored as JSON
            $table->char('genre', 1); // genre, single character
            $table->integer('etat'); // etat
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
