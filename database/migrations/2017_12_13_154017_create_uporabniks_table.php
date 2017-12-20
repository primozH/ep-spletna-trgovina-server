<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUporabnikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uporabnik', function (Blueprint $table) {
            $table->increments('id_uporabnik');
            $table->string("ime", 45)->nullable(false);
            $table->string("priimek", 100)->nullable(false);
            $table->string("email", 255)->nullable(false);
            $table->string("naslov", 255);
            $table->string("tel_stevilka", 15);
            $table->string("hash_gesla", 200);
            $table->timestamps();

            $table->primary("id_uporabnik");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uporabniks');
    }
}
