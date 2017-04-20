<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_address')->unsigned();
            $table->integer('id_type')->unsigned();
            $table->timestamps();
            //Forein Keys
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_address')->references('id')->on('addresses');
            $table->foreign('id_type')->references('id')->on('types');

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('people');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
