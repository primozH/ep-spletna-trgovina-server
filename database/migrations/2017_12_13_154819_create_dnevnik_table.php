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
            $table->timestamp("datum_cas")->default(\DB::raw("CURRENT_TIMESTAMP"));
            $table->string("opis", 255)->nullable(false);
            $table->string("tip", 45)->nullable(false);
            $table->integer("id_uporabnik", false, true)->nullable(false);

            $table->primary(["id_uporabnik", "datum_cas"]);

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
