<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postavka extends Model
{
    protected $table = "postavka";

    protected $primaryKey = ["id_produkt", "id_racun"];

    protected $incrementing = false;
}
