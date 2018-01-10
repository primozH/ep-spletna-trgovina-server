<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailVerificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_potrditev', function (Blueprint $table) {
            $table->integer("id_uporabnik", false, true);
            $table->string("zeton");
            $table->timestamps();

            $table->foreign("id_uporabnik")
                ->references("id_uporabnik")
                ->on("uporabnik");

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
        Schema::dropIfExists('email_potrditev');
    }
}
