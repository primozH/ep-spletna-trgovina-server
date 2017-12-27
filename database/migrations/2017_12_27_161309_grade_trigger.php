<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GradeTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        DB::unprepared("
//            CREATE TRIGGER average_grade
//            AFTER INSERT ON ocena
//            FOR EACH ROW
//            BEGIN
//                calculate_average_grade(NEW.id_produkt);
//            END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER average_grade");
    }
}
