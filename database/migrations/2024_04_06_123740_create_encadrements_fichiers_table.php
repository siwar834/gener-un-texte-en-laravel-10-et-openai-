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
        Schema::create('encadrements_fichiers', function (Blueprint $table) {
            $table->id();
            $table->integer('directeur_id');
            $table->integer('encadrement_id');
            $table->integer('user_id');
            $table->string('titre');
            $table->string('fichier');
            $table->string('discussion');
            
            $table->date('datetime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encadrements_fichiers');
    }
};
