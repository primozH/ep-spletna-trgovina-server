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
        $postavke = [
            [
                "kolicina" => 1,
                "id_produkt" => 1,
                "id_racun" => 1,
            ],
            [
                "kolicina" => 2,
                "id_produkt" => 4,
                "id_racun" => 2,
            ],
            [
                "kolicina" => 1,
                "id_produkt" => 2,
                "id_racun" => 1,
            ],
            [
                "kolicina" => 1,
                "id_produkt" => 5,
                "id_racun" => 3,
            ]
        ];

        foreach ($postavke as $item) {
            $postavka = new Postavka;
            $postavka->kolicina = $item["kolicina"];
            $postavka->id_produkt = $item["id_produkt"];
            $postavka->id_racun = $item["id_racun"];

            $postavka->save();
        }
    }
}
