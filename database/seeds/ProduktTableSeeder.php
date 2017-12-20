<?php

use Illuminate\Database\Seeder;
use Api\Produkt;

class ProduktTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $products = [
    ];

    public function run()
    {
        $produkt = new Produkt;
        $produkt->naziv = "Prenosni računalnik Asus ROG";
        $produkt->opis = "Prenosni računalnik Asus ROG je namenjen najzahtevnejšim igralcem računalniških iger."
                        ."Z grafično kartico Nvidia GTX1080 ne bo nobena ovira previsoka.";

        $produkt->save();
    }
}
