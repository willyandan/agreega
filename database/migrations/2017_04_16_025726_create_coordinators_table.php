<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_school')->unsigned();
            $table->bigInteger('id_person')->unsigned();
            //Chaves estrangeiras
            $table->foreign('id_school')->references('id')->on('schools');
            $table->foreign('id_person')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('coordinators');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
