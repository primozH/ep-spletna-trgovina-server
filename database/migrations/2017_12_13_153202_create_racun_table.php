<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racun', function (Blueprint $table) {
            $table->increments("id_racun");
            $table->date("datum");
            $table->integer("storniran_racun", false, true)->default(null);
            $table->enum("status", ["potrjen", "preklican", "odprt", "zakljucen"])->default("odprt");
            $table->integer("id_prodajalec", false, true);
            $table->integer("id_stranka", false, true)->nullable(false);
            $table->decimal("znesek", 8, 2);
            $table->timestamps();


            $table->foreign("id_prodajalec")
                    ->references("id_uporabnik")
                    ->on("uporabnik");
            $table->foreign("id_stranka")
                ->references("id_uporabnik")
                ->on("uporabnik");
            $table->foreign("storniran_racun")
                ->references("id_racun")
                ->on("racun");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('racun');
    }
}
