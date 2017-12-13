<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
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
            $table->softDeletes();
            $table->timestamps();

            $table->primary("id_produkt");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('izdelek');
    }
}
