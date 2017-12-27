<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostavkaTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER insert_price
            BEFORE INSERT ON postavka
            FOR EACH ROW
            BEGIN
                DECLARE vCena DECIMAL(8,2);
                
                SELECT cena INTO vCena
                FROM cenik
                WHERE NEW.id_produkt = cenik.id_produkt
                ORDER BY cenik.veljavno_do DESC
                LIMIT 1;
                
                SET NEW.cena = vCena;
            END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::uprepared("DROP TRIGGER insert_price");
    }
}
