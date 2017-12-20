<?php

namespace Api;

use Illuminate\Database\Eloquent\Model;

class UporabnikVloga extends Model
{
    protected $table = "uporabnik_vloga";

    protected $primaryKey = ["id_uporabnik", "id_vloga"];

    protected $incrementing = false;

    public function role()
    {
        return $this->belongsTo("Api\Vloga", "id_vloga", "id_vloga");
    }

    public function account()
    {
        return $this->belongsTo("Api\Uporabnik", "id_uporabnik", "id_uporabnik");
    }
}
