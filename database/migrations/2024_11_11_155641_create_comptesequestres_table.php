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
        Schema::create('comptesequestres', function (Blueprint $table) {
            $table->id();
            $table->double('solde', 15, 2)->default(0.00);
            $table->dateTime('dateCreation')->useCurrent();
            $table->dateTime('dernierMouvement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compte_sequestres');
    }
};
