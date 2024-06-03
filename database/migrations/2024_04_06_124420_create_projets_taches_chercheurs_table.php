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
        Schema::create('projets_taches_chercheurs', function (Blueprint $table) {
            $table->id();
            $table->integer('directeur_id');
            $table->integer('membre_id');
            $table->integer('tache_id');
            $table->string('description');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets_taches_chercheurs');
    }
};
