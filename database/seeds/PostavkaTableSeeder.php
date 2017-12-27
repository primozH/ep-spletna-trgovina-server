<?php

use Illuminate\Database\Seeder;
use App\Postavka;

class PostavkaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postavka = new Postavka;
        $kolicina = 1;

        $postavka->kolicina = $kolicina;
        $postavka->id_produkt = 1;
        $postavka->id_racun = 1;

        $postavka->save();
    }
}
