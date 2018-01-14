<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Invoice extends Resource
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
            "id" => $this->id_racun,
            "datum" => $this->datum,
            "storniran" => $this->storniran,
            "status" => $this->status,
            "id_prodajalec" => $this->id_prodajalec,
            "id_stranka" => $this->id_stranka,
            "znesek" => $this->znesek,
            "postavke" => $this->invoiceItems
        ];
    }
}
