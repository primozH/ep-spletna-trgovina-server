<?php

namespace App\Http\Controllers;

use Api\Cenik;
use Illuminate\Http\Request;
use Api\Produkt;
use Api\Http\Resources\Produkt as ProduktResource;

const DEFAULT_TIME = "2099-01-01";

class ProductControllerApi extends Controller
{

    public function retrieveProducts() {
        $products = Produkt::all();
        return ProduktResource::collection($products);
    }

    public function retrieveProduct($id) {
        $product = Produkt::find($id);
        return new ProduktResource($product);
    }
}
