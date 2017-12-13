<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dnevnik extends Model
{
    protected $table = "dnevnik";

    protected $primaryKey = ["datum_cas", "id_uporabnik"];

    protected $incrementing = false;

    protected $timestamps = false;
}
