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
        Schema::create('locataires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('code')->unique()->nullable();
            $table->string('cnib');
            $table->date('date_amenagement')->nullable();
            $table->string('telephone');
            $table->string('profession')->nullable();
            $table->string('quartier')->nullable();
            $table->string('prevent_name')->nullable();
            $table->string('prevent_phone')->nullable();
            $table->string('statut')->nullable();
            $table->integer('caution_electricite')->nullable();
            $table->integer('caution_eau')->nullable();
            $table->integer('prolata')->nullable();
            $table->integer('caution_verse')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locataires');
    }
};
