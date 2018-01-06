<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UporabnikVloga extends Model
{
    protected $table = "uporabnik_vloga";

    protected $primaryKey = ["id_uporabnik", "id_vloga"];

    public $incrementing = false;

    public function role()
    {
        return $this->belongsTo("App\Vloga", "id_vloga", "id_vloga");
    }

    public function account()
    {
        return $this->belongsTo("App\Uporabnik", "id_uporabnik", "id_uporabnik");
    }
}
