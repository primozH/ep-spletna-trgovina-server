<?php

use Illuminate\Database\Seeder;
use App\Cenik;

class CenikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cenik = [
            [
                "cena" => 2245.60,
                "id_produkt" => 1,
                "veljavno_do" => date_create("12-01-2018")
            ],
            [
                "cena" => 1500,
                "id_produkt" => 2,
                "veljavno_do" => date_create("12-01-2018")
            ],
            [
                "cena" => 1000,
                "id_produkt" => 3,
                "veljavno_do" => date_create("12-01-2018")
            ],
            [
                "cena" => 500,
                "id_produkt" => 4,
                "veljavno_do" => date_create("12-01-2018")
            ]
        ];

        foreach ($cenik as $item)
        {

            $cena = new Cenik;
            $cena->cena = $item["cena"];
            $cena->id_produkt = $item["id_produkt"];
            $cena->veljavno_do = $item["veljavno_do"];
            $cena->save();
        }

    }
}
