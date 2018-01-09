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
                "ime" => "Marko",
                "priimek" => "Zajc",
                "email" => "admin@etrgovina.si",
                "geslo" => "admin"
            ],
            [
                "ime" => "Miha",
                "priimek" => "Mazovec",
                "email" => "miha.mazovec@gmail.com",
                "geslo" => "miham"
            ],
            [
                "ime" => "Primož",
                "priimek" => "Hrovat",
                "email" => "primoz.hrovat.96@gmail.com",
                "geslo" => "primoz"
            ],
            [
                "ime" => "Janez",
                "priimek" => "The Man",
                "email" => "janez@admin.si",
                "geslo" => "1234",
            ],
            [
                "ime" => "Marko",
                "priimek" => "Skače",
                "email" => "marko.skace@trata.si",
                "geslo" => "1234",
            ],
            [
                "ime" => "Matija",
                "priimek" => "Majer",
                "email" => "matija.majer@dobrojutro.si",
                "geslo" => "1234",
            ],
            [
                "ime" => "Janez",
                "priimek" => "Novak",
                "email" => "janez@novak.si",
                "geslo" => "1234",
                "naslov" => "Borovnica 12",
                "tel_stevilka" => "041999999"
            ],
            [
                "ime" => "Krištof",
                "priimek" => "Mirni",
                "email" => "kristof@majka.si",
                "geslo" => "54621",
                "naslov" => "Maribor 12",
                "tel_stevilka" => "051555555"
            ],
            [
                "ime" => "Matija",
                "priimek" => "Mako",
                "email" => "matija@matija.si",
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
            $account->geslo = password_hash($item["geslo"], PASSWORD_BCRYPT);
            if (array_key_exists("naslov", $item))
            {
                $account->naslov = $item["naslov"];
            }
            if (array_key_exists("tel_stevilka", $item))
            {
                $account->tel_stevilka = $item["tel_stevilka"];
            }

            $account->save();
        }
    }
}
