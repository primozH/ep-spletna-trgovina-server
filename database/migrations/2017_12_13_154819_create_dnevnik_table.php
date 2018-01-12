<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDnevnikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dnevnik', function (Blueprint $table) {
            $table->increments("id");
            $table->timestamp("datum_cas")->default(\DB::raw("CURRENT_TIMESTAMP"));
            $table->longText("opis")->nullable(false);
            $table->string("tip", 45)->nullable(true);
            $table->integer("id_uporabnik", false, true)->nullable(false);

            $table->foreign("id_uporabnik")
                    ->references("id_uporabnik")
                    ->on("uporabnik");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dnevnik');
    }
}
