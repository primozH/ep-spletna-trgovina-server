<?php

use Illuminate\Database\Seeder;
use App\UporabnikVloga;

class VlogaUporabnikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vloge = [
            [
                "id_vloga" => 1,
                "id_uporabnik" => 1,
            ],
            [
                "id_vloga" => 2,
                "id_uporabnik" => 2,
            ],
            [
                "id_vloga" => 2,
                "id_uporabnik" => 3
            ],

            [
                "id_vloga" => 3,
                "id_uporabnik" => 4
            ],
            [
                "id_vloga" => 3,
                "id_uporabnik" => 5
            ],
            [
                "id_vloga" => 3,
                "id_uporabnik" => 6
            ],
        ];

        foreach ($vloge as $item)
        {

            $vloga = new UporabnikVloga;
            $vloga->id_vloga = $item["id_vloga"];
            $vloga->id_uporabnik = $item["id_uporabnik"];
            $vloga->save();
        }

    }
}
