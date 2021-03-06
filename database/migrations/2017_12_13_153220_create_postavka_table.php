<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostavkaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postavka', function (Blueprint $table) {
            $table->integer("kolicina", false, true)->default(1);
            $table->integer("id_produkt", false, true)->nullable(false);
            $table->integer("id_racun", false, true)->nullable(false);
            $table->decimal("cena", 7, 2)->default(0.0);
            $table->timestamps();


            $table->primary(["id_racun", "id_produkt"]);

            $table->foreign("id_produkt")
                    ->references("id_produkt")
                    ->on("produkt");
            $table->foreign("id_racun")
                    ->references("id_racun")
                    ->on("racun");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postavka');
    }
}
