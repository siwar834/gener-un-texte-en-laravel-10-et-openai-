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
        Schema::create('encadrements_taches', function (Blueprint $table) {
            $table->id();
            $table->integer('directeur_id');
            $table->integer('encadrement_id');
            $table->string('tache');
            $table->string('discussion');
            $table->string('etat');
            $table->date('date_debut');
            $table->date('date_fin');
        
       
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encadrements_taches');
    }
};
