<?php

use Illuminate\Database\Seeder;
use Api\Racun;

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
                "id_stranka"=>1
            ],
            [
                "id_stranka" => 2
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
