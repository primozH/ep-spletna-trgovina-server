<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlikaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slika', function (Blueprint $table) {
            $table->increments('id_slike');
            $table->string("pot")->nullable(false);
            $table->integer("id_produkt", false, true)->nullable(false);
            $table->string("alias")->nullable(false);
            $table->timestamps();

            $table->foreign("id_produkt")
                    ->references("id_produkt")
                    ->on("produkt");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slika');
    }
}
