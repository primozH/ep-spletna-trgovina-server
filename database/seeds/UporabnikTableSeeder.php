<?php

use Illuminate\Database\Seeder;
use App\Uporabnik;

class UporabnikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedData();
    }

    private function seedData() {
        $accounts = [
            [
                "ime" => "Janez",
                "priimek" => "Novak",
                "email" => "janez@novak.si",
                "uporabnisko_ime" => "janezek",
                "geslo" => "1234",
                "naslov" => "Borovnica 12",
                "tel_stevilka" => "041999999"
            ],
            [
                "ime" => "Krištof",
                "priimek" => "Mirni",
                "email" => "kristof@majka.si",
                "uporabnisko_ime" => "kristof",
                "geslo" => "54621",
                "naslov" => "Maribor 12",
                "tel_stevilka" => "051555555"
            ],
            [
                "ime" => "Matija",
                "priimek" => "Mako",
                "email" => "matija@matija.si",
                "uporabnisko_ime" => "mato",
                "geslo" => "12345",
                "naslov" => "Koroška Bela 12",
                "tel_stevilka" => "069000000"
            ]
        ];

        foreach($accounts as $item) {
            $account = new Uporabnik;

            $account->ime = $item["ime"];
            $account->priimek = $item["priimek"];
            $account->email = $item["email"];
            $account->geslo = bcrypt($item["geslo"]);
            $account->uporabnisko_ime = $item["uporabnisko_ime"];
            $account->naslov = $item["naslov"];
            $account->tel_stevilka = $item["tel_stevilka"];

            $account->save();
        }
    }
}
