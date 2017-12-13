<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UporabnikVloga extends Model
{
    protected $table = "uporabnik_vloga";

    protected $primaryKey = ["id_uporabnik", "id_vloga"];

    protected $incrementing = false;
}
