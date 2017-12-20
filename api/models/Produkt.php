<?php

namespace Api;

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
            ->hasMany("Api\Cenik", "id_produkt", "id_produkt")
            ->orderBy("veljavno_do", "desc")
            ->first();
    }

    public function prices()
    {
        return $this
            ->hasMany("Api\Cenik", "id_produkt", "id_produkt");
    }

    public function images()
    {
        return $this->hasMany("Api\Slika", "id_slika", "id_slika");
    }
}
