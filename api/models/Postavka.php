<?php

namespace Api;

use Illuminate\Database\Eloquent\Model;

class Postavka extends Model
{
    protected $table = "postavka";

    protected $primaryKey = ["id_produkt", "id_racun"];

    public $incrementing = false;

    public function product()
    {
        $this->belongsTo("Api\Produkt", "id_produkt", "id_produkt");
    }

    public function invoice()
    {
        $this->belongsTo("Api\Racun", "id_racun", "id_racun");
    }
}
