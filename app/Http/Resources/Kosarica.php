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