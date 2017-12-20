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
            $table->integer("id_produkt")->nullable(false);
            $table->date("veljavno_do")->nullable(false);
            $table->timestamps();

            $table->primary("zap_st");

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
        Schema::dropIfExists('ceniks');
    }
}
