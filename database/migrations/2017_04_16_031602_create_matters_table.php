<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matter', 100);
            $table->integer('id_teacher')->unsigned();
            $table->integer('id_school')->unsigned();
            //chave estrangeria
            $table->foreign('id_teacher')->references('id')->on('teachers');
            $table->foreign('id_school')->references('id')->on('schools');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matters');
    }
}
