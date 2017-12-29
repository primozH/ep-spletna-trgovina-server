<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postavka extends Model
{
    protected $table = "postavka";

    protected $primaryKey = ["id_produkt", "id_racun"];

    public $incrementing = false;



    public function invoice()
    {
        return $this->belongsTo("App\Racun", "id_racun", "id_racun");
    }
}
