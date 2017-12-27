<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocena extends Model
{
    protected $table = "ocena";

    protected $primaryKey = ["id_uporabnik", "id_produkt"];

    protected $incrementing = false;

    public function product()
    {
        return $this->belongsTo("Api\Produkt", "id_produkt", "id_produkt");
    }

    public function account()
    {
        return $this->belongsTo("Api\Produkt", "id_uporabnik", "id_uporabnik");
    }
}
