<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 8.1.2018
 * Time: 16:00
 */

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\Resource;

class Kosarica extends Resource
{
    public function toArray($request)
    {
        $produkt = $this->product;
        return [
            "id_produkt" => $this->id_produkt,
            "naziv" => $produkt->naziv,
            "cena" => $produkt->currentPrice()->cena,
            "valuta" => $produkt->currentPrice()->valuta,
            "id_uporabnik" => $this->id_uporabnik,
            "kolicina" => $this->kolicina,
        ];
    }
}