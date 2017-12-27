<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produkt extends Model
{
    protected $table = "produkt";

    protected $primaryKey = "id_produkt";

    use SoftDeletes;

    protected $dates = ["deleted_at"];

    public function currentPrice()
    {
        return $this
            ->hasMany("App\Cenik", "id_produkt", "id_produkt")
            ->orderBy("veljavno_do", "desc")
            ->first();
    }

    public function prices()
    {
        return $this
            ->hasMany("App\Cenik", "id_produkt", "id_produkt");
    }

    public function images()
    {
        return $this->hasMany("App\Slika", "id_produkt", "id_produkt");
    }
}
