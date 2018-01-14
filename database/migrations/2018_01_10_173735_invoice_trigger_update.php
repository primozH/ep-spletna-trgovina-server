<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoiceTriggerUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER recalculate_price
            AFTER INSERT ON postavka
            FOR EACH ROW
            BEGIN
                UPDATE racun
                SET znesek = calculate_price(NEW.id_racun)
                WHERE racun.id_racun = NEW.id_racun;
            END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER IF EXISTS recalculate_price");
    }
}
