<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduktTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produkt', function (Blueprint $table) {
            $table->increments('id_produkt');
            $table->string("naziv", 255)->nullable(false);
            $table->string("opis", 2000)->nullable(false);
            $table->decimal("povprecna_ocena", 3, 1)->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('produkt');
    }
}
