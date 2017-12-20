<?php

use Illuminate\Database\Seeder;
use Api\Postavka;

class PostavkaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postavka = new Postavka;
        $kolicina = 1;

        $postavka->kolicina = $kolicina;
        $postavka->id_produkt = 1;
        $postavka->id_racun = 1;

        $postavka->save();

        $product = $postavka->product();
        $cena = $product->currentPrice()->cena;
        $postavka->cena = $cena * $kolicina;

        $postavka->save();

        $invoice = $postavka->invoice();
        $items = $invoice->invoiceItems();

        $cost = 0;
        foreach($items as $item) {
            $cost += $item->cena;
        }

        $invoice->znesek = $cost;
        $invoice->save();
    }
}
