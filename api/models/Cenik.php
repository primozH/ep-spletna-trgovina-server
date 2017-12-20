<?php

namespace Api;

use Illuminate\Database\Eloquent\Model;

class Cenik extends Model
{
    protected $table = "cenik";

    protected $primaryKey = "zap_st";

    public function product() {
        return $this
            ->belongsTo("Api\Produkt","id_produkt", "id_produkt");
    }
}
