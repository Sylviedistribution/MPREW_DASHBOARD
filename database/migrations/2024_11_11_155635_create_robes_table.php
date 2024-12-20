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
        Schema::create('robes', function (Blueprint $table) {
            $table->id(); // id (auto-incremented primary key)
            $table->string('nom'); // imagePath
            $table->integer('prix'); // imagePath
            $table->dateTime('date'); // date
            $table->unsignedBigInteger('colId'); // colId (foreign key)
            $table->unsignedBigInteger('coupeId'); // coupeId (foreign key)
            $table->unsignedBigInteger('mancheId'); // mancheId (foreign key)
            $table->unsignedBigInteger('jupeId'); // jupeId (foreign key)
            $table->unsignedBigInteger('tissuId'); // tissuId (foreign key)
            $table->unsignedBigInteger('clientId'); // clientId (foreign key)
            $table->timestamps(); // created_at and updated_at timestamps

            // Add foreign key constraints (assuming related tables exist)
            $table->foreign('colId')->references('id')->on('cols')->onDelete('cascade');
            $table->foreign('coupeId')->references('id')->on('coupes')->onDelete('cascade');
            $table->foreign('mancheId')->references('id')->on('manches')->onDelete('cascade');
            $table->foreign('jupeId')->references('id')->on('jupes')->onDelete('cascade');
            $table->foreign('tissuId')->references('id')->on('tissues')->onDelete('cascade');
            $table->foreign('clientId')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('robes');
    }
};
