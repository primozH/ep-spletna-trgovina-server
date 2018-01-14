<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosarica', function (Blueprint $table) {
            $table->integer('id_uporabnik', false, true);
            $table->integer("id_produkt", false, true);
            $table->integer("kolicina", false, true);
            $table->timestamps();

            $table->primary(["id_uporabnik", "id_produkt"]);

            $table->foreign("id_uporabnik")
                ->references("id_uporabnik")
                ->on("uporabnik");

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
        Schema::dropIfExists('kosarica');
    }
}
