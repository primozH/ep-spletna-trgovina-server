<?php

namespace Api;

use Illuminate\Database\Eloquent\Model;

class Dnevnik extends Model
{
    protected $table = "dnevnik";

    protected $primaryKey = ["datum_cas", "id_uporabnik"];

    protected $incrementing = false;

    protected $timestamps = false;

    public function account()
    {
        return $this->$this->belongsTo("Api\Uporabnik", "id_uporabnik", "id_uporabnik");
    }
}
