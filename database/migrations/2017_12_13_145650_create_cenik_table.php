<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cenik', function (Blueprint $table) {
            $table->increments('zap_st');
            $table->decimal("cena", 7, 2)->default(0.0);
            $table->integer("id_produkt", false, true)->nullable(false);
            $table->date("veljavno_do")->nullable(false);
            $table->string("valuta", 5)->default("EURO");
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
        Schema::dropIfExists('cenik');
    }
}
