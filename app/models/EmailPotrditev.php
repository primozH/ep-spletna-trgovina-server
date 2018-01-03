<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailPotrditev extends Model
{
    protected $table = "email_potrditev";

    public function user()
    {
        return $this->belongsTo("App\Uporabnik", "id_uporabnik", "id_uporabnik");
    }
}
