<?php

use Illuminate\Database\Seeder;
use App\Racun;

class RacunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoices = [
            [
                "id_stranka"=>4
            ],
            [
                "id_stranka" => 5
            ],
            [
                "id_stranka" => 5
            ]
        ];

        foreach ($invoices as $item)
        {

            $invoice = new Racun;
            $invoice->id_stranka = $item["id_stranka"];

            $invoice->save();
        }
    }
}
