<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('nom');
            $table->string('prenom');
            $table->foreignId('condition_id')->constrained();
            $table->bigInteger('surface');
            $table->foreignId('ville_id')->constrained();
            $table->string('photo')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('places');
            $table->boolean('vetements')->nullable();
            $table->boolean('draps')->nullable();
            $table->boolean('nourriture')->nullable();
            $table->boolean('argent')->nullable();
            $table->text('infos');
            $table->text('phone');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}
