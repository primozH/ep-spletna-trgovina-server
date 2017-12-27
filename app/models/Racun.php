<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Racun extends Model
{
    protected $table = "racun";

    protected $primaryKey = "id_racun";

    use SoftDeletes;

    protected $dates = ["deleted_at"];

    public function customer()
    {
        return $this->belongsTo("Api\Uporabnik", "id_stranka", "id_uporabnik");
    }

    public function salesman()
    {
        return $this->belongsTo("Api\Uporabnik", "id_prodajalec", "id_uporabnik");
    }

    public function invoiceItems()
    {
        return $this->hasMany("Api\Postavka", "id_racun", "id_racun");
    }

    public function canceledBy()
    {
        return $this->belongsTo("Api\Racun", "stornirano", "id_racun");
    }
}
