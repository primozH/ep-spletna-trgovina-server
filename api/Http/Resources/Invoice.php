<?php

namespace Api\Http\Resources;

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
            "date" => $this->datum,
            "cancelled_by" => $this->storniran,
            "status" => $this->status,
            "id_salesman" => $this->id_prodajalec,
            "id_customer" => $this->id_stranka,
            "znesek" => $this->znesek,
            "items" => $this->invoiceItems()->get()
        ];
    }
}
