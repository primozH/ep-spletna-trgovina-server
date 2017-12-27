<?php

use Illuminate\Database\Seeder;
use App\Produkt;

class ProduktTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        $products = [
            [
                "naziv"=>"Prenosni računalnik Asus ROG",
                "opis"=>"Prenosni računalnik Asus ROG je namenjen najzahtevnejšim igralcem računalniških iger."
                    ."Z grafično kartico Nvidia GTX1080 ne bo nobena ovira previsoka."
            ],
            [
                "naziv"=>"Prenosni računalnik Lenovo Thinkpad",
                "opis"=>"Prenosni računalnik Toshiba ponuja izjemno kakovost in vsestransko uporabnost"
            ],
            [
                "naziv"=>"Namizni računalnik Toshiba",
                "opis"=>"Ugodno razmerje med ceno in uporabnostjo. Kos bo vsem pisarniškim opravilom."
            ],
            [
                "naziv"=>"Grafična kartica Gigabyte RX580",
                "opis"=>"Zmogljiva grafična kartica"
            ]
        ];
        foreach ($products as $product) {

            $produkt = new Produkt;
            $produkt->naziv = $product["naziv"];
            $produkt->opis = $product["opis"];
            $produkt->save();
        }

    }
}
