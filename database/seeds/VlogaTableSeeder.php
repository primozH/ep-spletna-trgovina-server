<?php

use Illuminate\Database\Seeder;
use App\Vloga;

class VlogaTableSeeder extends Seeder
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
                "naziv" => "admin"
            ],
            [
                "naziv" => "prodajalec"
            ],
            [
                "naziv" => "stranka"
            ],

        ];

        foreach ($vloge as $item)
        {

            $vloga = new Vloga;
            $vloga->naziv = $item["naziv"];
            $vloga->save();
        }

    }
}
