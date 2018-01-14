<?php

use Illuminate\Database\Seeder;
use App\Ocena;

class OcenaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ocene = [
            [
                "ocena" => 5,
                "id_uporabnik" => 1,
                "id_produkt" => 1,
            ],
            [
                "ocena" => 5,
                "id_uporabnik" => 2,
                "id_produkt" => 1,
            ],
            [
                "ocena" => 3,
                "id_uporabnik" => 3,
                "id_produkt" => 1,
            ],
            [
                "ocena" => 2,
                "id_uporabnik" => 3,
                "id_produkt" => 2,
            ],
            [
                "ocena" => 3,
                "id_uporabnik" => 3,
                "id_produkt" => 4,
            ]
        ];

        foreach ($ocene as $item)
        {

            $ocena = new Ocena;
            $ocena->ocena = $item["ocena"];
            $ocena->id_produkt = $item["id_produkt"];
            $ocena->id_uporabnik = $item["id_uporabnik"];
            $ocena->save();
        }
    }
}
