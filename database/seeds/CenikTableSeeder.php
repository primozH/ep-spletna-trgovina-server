<?php

use Illuminate\Database\Seeder;
use Api\Cenik;

class CenikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cena = new Cenik;
        $cena->cena = 2245.55;
        $cena->id_produkt = 1;
        $cena->veljavno_do = date_create("12-01-2018");

        $cena->save();
    }
}
