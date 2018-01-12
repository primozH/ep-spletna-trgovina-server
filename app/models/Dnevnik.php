<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dnevnik extends Model
{
    protected $table = "dnevnik";

    public $timestamps = false;

    public function account()
    {
        return $this->$this->belongsTo("Api\Uporabnik", "id_uporabnik", "id_uporabnik");
    }
}
