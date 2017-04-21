<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassHasPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_has_person', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('id_person')->unsigned();
            $table->integer('id_class')->unsigned();
            //chave estrangeria
            $table->foreign('id_person')->references('id')->on('people');
            $table->foreign('id_class')->references('id')->on('classes');
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
        Schema::dropIfExists('class_has_person');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
