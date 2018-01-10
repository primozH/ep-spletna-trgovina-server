<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailPotrditev extends Model
{
    protected $table = "email_potrditev";

    protected $primaryKey = "id_uporabnik";

    public function user()
    {
        return $this->belongsTo("App\Uporabnik", "id_uporabnik", "id_uporabnik");
    }
}
