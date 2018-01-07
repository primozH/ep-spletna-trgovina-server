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
            $table->string("email", 255)->nullable(false)->unique();
            $table->string("naslov", 255)->nullable(true);
            $table->string("tel_stevilka", 15)->nullable(true);
            $table->string("geslo", 255);
            $table->boolean("potrjen")->default(false);
            $table->boolean("aktiviran")->default(true);
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
        Schema::dropIfExists('uporabnik');
    }
}
