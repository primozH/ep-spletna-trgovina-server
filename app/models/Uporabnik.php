<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uporabnik extends Model
{
    protected $table = "uporabnik";

    protected $primaryKey = "id_uporabnik";

    protected $guarded = [];

    public function logs()
    {
        return $this->hasMany("App\Dnevnik", "id_uporabnik", "id_uporabnik");
    }

    public function roles()
    {
        return $this->hasMany("App\UporabnikVloga", "id_uporabnik", "id_uporabnik");
    }

    public function ordersForCustomer()
    {
        return $this->hasMany("App\Racun", "id_stranka", "id_uporabnik");
    }

    public function ordersForSalesman()
    {
        return $this->hasMany("App\Racun", "id_prodajalec", "id_uporabnik");
    }

    public function ratings()
    {
        return $this->hasMany("App\Ocena", "id_uporabnik", "id_uporabnik");
    }

    public function cartItems()
    {
        return $this->hasMany("App\Kosarica", "id_uporabnik", "id_uporabnik");
    }

}
