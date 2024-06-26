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
        Schema::create('contrat_bailleurs', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('situation')->nullable();
            $table->date('date')->nullable();
            $table->foreignId('bailleurs_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('immeubles_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('users_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrat_bailleurs');
    }
};
