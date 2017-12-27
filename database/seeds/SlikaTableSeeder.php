<?php

use Illuminate\Database\Seeder;
use Api\Slika;

class SlikaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $images = [
            [
                "pot" => "/images/G751-Left-Open135-Top.jpg",
                "id_produkt" => 1,
                "alias" => "Asus ROG"
            ]
        ];

        foreach ($images as $item) {

            $image = new Slika;
            $image->pot = $item["pot"];
            $image->id_produkt = $item["id_produkt"];
            $image->alias = $item["alias"];

            $image->save();
        }

    }
}