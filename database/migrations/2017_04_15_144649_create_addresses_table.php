<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cep',8);
            $table->integer('id_city')->unsigned();
            $table->string('neighborhood', 90);
            $table->string('street', 250);
            $table->string('number', 20);
            $table->string('complement', 250)->nullable();
            $table->foreign('id_city')->references('id')->on('cities');
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
        //
        Schema::dropIfExists('addresses');
    }
}
