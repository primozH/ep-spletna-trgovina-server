<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 3.1.2018
 * Time: 14:34
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Kosarica extends Model
{
    protected $table = "kosarica";

    protected $primaryKey = ["id_uporabnik", "id_produkt"];

    public $incrementing = false;

    protected $fillable = ["kosarica"];


    public function user()
    {
        return $this->belongsTo("App\Uporabnik", "id_uporabnik", "id_produkt");
    }

    public function product()
    {
        return $this->belongsTo("App\Produkt", "id_produkt", "id_produkt");
    }
}