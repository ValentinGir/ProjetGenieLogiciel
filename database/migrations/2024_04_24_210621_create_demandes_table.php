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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('telephone')->unique();
            $table->string('email')->unique();
            $table->boolean('statut')->default(false);
            $table->boolean('archive')->default(false);
            $table->unsignedTinyInteger('nb_heures')->default(0);
            $table->date('date')->nullable()->default(null);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('matiere_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};

