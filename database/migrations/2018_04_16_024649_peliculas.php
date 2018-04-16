<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Peliculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->date('fechaEstreno');
            $table->longText('imagen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("peliculas");
    }
}
