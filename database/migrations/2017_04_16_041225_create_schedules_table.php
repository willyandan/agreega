<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->time('start');
            $table->time('end');
            $table->string('day',3);
            $table->integer('id_class')->unsigned();
            $table->integer('id_matter')->unsigned();
            $table->timestamps();
            //chave estrangeria
            $table->foreign('id_class')->references('id')->on('classes');
            $table->foreign('id_matter')->references('id')->on('matters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
