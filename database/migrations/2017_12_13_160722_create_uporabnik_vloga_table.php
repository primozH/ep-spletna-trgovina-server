<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUporabnikVlogaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uporabnik_vloga', function (Blueprint $table) {
            $table->integer("id_uporabnik", false, true);
            $table->integer("id_vloga", false, true);
            $table->timestamps();

            $table->primary(["id_uporabnik", "id_vloga"]);

            $table->foreign("id_uporabnik")
                    ->references("id_uporabnik")
                    ->on("uporabnik");
            $table->foreign("id_vloga")
                    ->references("id_vloga")
                    ->on("vloga");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uporabnik_vloga');
    }
}
