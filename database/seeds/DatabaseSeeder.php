<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UporabnikTableSeeder::class,
            ProduktTableSeeder::class,
            CenikTableSeeder::class,
            RacunTableSeeder::class,
            PostavkaTableSeeder::class,
            SlikaTableSeeder::class,
            OcenaTableSeeder::class,
        ]);
    }
}
