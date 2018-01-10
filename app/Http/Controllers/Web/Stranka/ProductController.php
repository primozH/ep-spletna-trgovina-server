<?php

namespace App\Http\Controllers\Web\Stranka;

use App\Cenik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produkt;
use App\Http\Resources\Produkt as ProduktResource;

const DEFAULT_TIME = "2099-01-01";

class ProductController extends Controller
{

    public function index() {
        $products = Produkt::all();
        return view('stranka.index', ["products"=>$products]);
    }

    public function productDetails($izdelekId) {
        $product = Produkt::find(htmlspecialchars($izdelekId));

        return view('stranka.produkt_podrobno_stranka', ["product" => $product]);
    }
}
