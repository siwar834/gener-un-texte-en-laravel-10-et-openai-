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
        Schema::create('equipements_maintenances', function (Blueprint $table) {
            $table->id();
            $table->integer('directeur_id'); 
              $table->integer('technicien_id');
               $table->integer('equipement_id');
               $table->string('description');
                  $table->integer('montant'); 
                    $table->date('date');

                 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipements_maintenances');
    }
};
