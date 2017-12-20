<?php

namespace Api;

use Illuminate\Database\Eloquent\Model;

class Slika extends Model
{
    protected $table = "slika";

    protected $primaryKey = "id_slike";

    public function product()
    {
        return $this->belongsTo("Api\Produkt", "id_produkt", "id_produkt");
    }
}
