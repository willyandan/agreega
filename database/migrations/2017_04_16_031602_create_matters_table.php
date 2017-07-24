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
            $table->bigInteger('id_person')->unsigned();
            $table->integer('id_school')->unsigned();
            $table->timestamps();
            //chave estrangeria
            $table->foreign('id_person')->references('id')->on('people');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('matters');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
