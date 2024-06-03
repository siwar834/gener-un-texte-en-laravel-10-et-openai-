<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetChercheursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projet__chercheurs', function (Blueprint $table) {
            $table->id();
           
            $table->integer('projet_id');
            $table->integer('chercheur_id');
            $table->string('titre');
            $table->string('description');
            $table->string('fonction');
            $table->string('ordre');
            $table->string('etat');
            $table->date('date_debut');
            $table->date('date_fin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projet__chercheurs');
    }
}
