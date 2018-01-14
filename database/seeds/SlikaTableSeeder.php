<?php

use Illuminate\Database\Seeder;
use App\Slika;

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
                "pot" => "/storage/images/G751-Left-Open135-Top.jpg",
                "id_produkt" => 1,
                "zap_st" => 1,
                "alias" => "Asus ROG"
            ],
            [
                "pot" => "/storage/images/lenovo-thinkpad-yoga-260.jpg",
                "id_produkt" => 2,
                "zap_st" => 1,
                "alias" => "Lenovo Thinkpad Yoga"
            ],
            [
                "pot" => "/storage/images/lenovo-thinkpad-yoga-260-hinge.jpg",
                "id_produkt" => 2,
                "zap_st" => 2,
                "alias" => "Lenovo Thinkpad Yoga Hinge"
            ],
            [
                "pot" => "/storage/images/toshiba-desktop.jpg",
                "id_produkt" => 3,
                "zap_st" => 1,
                "alias" => "Toshiba"
            ],
            [
                "pot" => "/storage/images/gigabyte_rx580.png",
                "id_produkt" => 4,
                "zap_st" => 1,
                "alias" => "Gigabyte Radeon RX580"
            ],
            [
                "pot" => "/storage/images/gigabyte-radeon-rx-470-g1-gaming-4g.jpg",
                "id_produkt" => 4,
                "zap_st" => 2,
                "alias" => "Gigabyte Radeon RX580"
            ],
            [
                "pot" => "/storage/images/GeForce_GTX_1080ti_3qtr_top_left.png",
                "id_produkt" => 5,
                "zap_st" => 1,
                "alias" => "Nvidia GeForce GTX 1080"
            ],
            [
                "pot" => "/storage/images/geforce-gtx-1080.png",
                "id_produkt" => 5,
                "zap_st" => 2,
                "alias" => "Nvidia GeForce GTX 1080"
            ],
        ];

        foreach ($images as $item) {

            $image = new Slika;
            $image->pot = $item["pot"];
            $image->id_produkt = $item["id_produkt"];
            $image->alias = $item["alias"];
            $image->zap_st = $item["zap_st"];

            $image->save();
        }

    }
}