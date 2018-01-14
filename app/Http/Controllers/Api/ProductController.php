<?php

namespace App\Http\Controllers\Api;

use App\Cenik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produkt;
use App\Http\Resources\Produkt as ProduktResource;

const DEFAULT_TIME = "2099-01-01";

class ProductController extends Controller
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
