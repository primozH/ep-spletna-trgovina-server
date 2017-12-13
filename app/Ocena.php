<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocena extends Model
{
    protected $table = "ocena";

    protected $primaryKey = ["id_uporabnik", "id_produkt"];

    protected $incrementing = false;
}
