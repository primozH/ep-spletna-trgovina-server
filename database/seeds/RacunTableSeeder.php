<?php

use Illuminate\Database\Seeder;
use Api\Racun;

class RacunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoice = new Racun;
        $invoice->id_stranka = 1;

        $invoice->save();
    }
}
