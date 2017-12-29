<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Produkt extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                "id" => $this->id_produkt,
                "naziv" => $this->naziv,
                "opis" => $this->opis,
                "cena" => $this->currentPrice()->cena,
                "ocena" => $this->povprecna_ocena
        ];
    }
}
