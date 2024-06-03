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
        Schema::create('fonds_depenses', function (Blueprint $table) {
            $table->id();
            $table->integer('directeur_id');
            $table->integer('fond_id');
       
            $table->string('nom');  
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
        Schema::dropIfExists('fonds_depenses');
    }
};
