<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalculateAvgGradeFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE FUNCTION calculate_average_grade (product_id INT)
        RETURNS DECIMAL(3,1)
        BEGIN
            RETURN (
                SELECT AVG(o.ocena)
                FROM ocena o
                WHERE o.id_produkt = product_id);
        END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP FUNCTION calculate_average_grade");
    }
}
