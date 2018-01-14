<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalculatePriceFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE FUNCTION calculate_price (invoice_id INT)
        RETURNS DECIMAL(8,2)
        BEGIN
            RETURN (
                SELECT SUM(p.cena * p.kolicina)
                FROM postavka p
                WHERE p.id_racun = invoice_id);
        END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP FUNCTION IF EXISTS calculate_price");
    }
}
