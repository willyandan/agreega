<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->bigInteger('id_address')->unsigned();
            $table->timestamps();
            //foreign key
            $table->foreign('id_address')->references('id')->on('addresses');
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
        Schema::dropIfExists('schools');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
