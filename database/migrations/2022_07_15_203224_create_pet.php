<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->foreing('user_id')->references('id')->on('users');       
            $table->string('nome');
            $table->string('especie');
            $table->string('raca');
            $table->string('porte');
            $table->string('pelagem');
            $table->string('cor_pelo');
            $table->string('sexo');
            $table->string('temperamento');
            $table->string('situacao');
            $table->text('historia');
            $table->integer('idade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet');
    }
}
