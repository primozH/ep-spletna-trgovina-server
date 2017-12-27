<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uporabnik extends Model
{
    protected $table = "uporabnik";

    protected $primaryKey = "id_uporabnik";

    public function logs()
    {
        return $this->hasMany("Api\Dnevnik", "id_uporabnik", "id_uporabnik");
    }

    public function roles()
    {
        return $this->hasMany("Api\UporabnikVloga", "id_uporabnik", "id_uporabnik");
    }

    public function ordersForCustomer()
    {
        return $this->hasMany("Api\Racun", "id_stranka", "id_uporabnik");
    }

    public function ordersForSalesman()
    {
        return $this->hasMany("Api\Racun", "id_prodajalec", "id_uporabnik");
    }

    public function ratings()
    {
        return $this->hasMany("Api\Ocena", "id_uporabnik", "id_uporabnik");
    }

}
