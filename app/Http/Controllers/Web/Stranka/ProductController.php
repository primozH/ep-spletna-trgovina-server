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
        $product = Produkt::find($izdelekId);

        return view('stranka.produkt_podrobno_stranka', ["product" => $product]);
    }

    public function createProduct(Request $req) {
        $product = new Produkt;
        $product->naziv = $req->input("naziv");
        $product->opis = $req->input("opis");

        $product->save();

        $this->insertNewPriceForProduct($product, $req->input("cena"), $req->input("valuta"));
        return new ProduktResource($product);
    }

    public function updateProduct(Request $req, $id)
    {
        $product = Produkt::findOrFail($id);

        $product->naziv = $req->input("produkt.naziv");
        $product->opis = $req->input("produkt.opis");

        $product->save();

        if ($req->input("produkt.cena"))
        {
            $this->insertNewPriceForProduct($product, $req->input("produkt.cena"), $req->input("produkt.valuta"));
        }

        return new ProduktResource($product);
    }

    public function deleteProduct($id) {
        $product_id = $id;

        Produkt::destroy($product_id);
        return response("", 204);
    }

    private function insertNewPriceForProduct($product, $price_json, $currency) {
        $price = new Cenik;
        $price->cena = $price_json;
        $price->veljavno_do = date_create(DEFAULT_TIME);
        $price->valuta = $currency;

        $old_price = $product->currentPrice();
        if ($old_price != null) {
            $old_price->veljavno_do = date_create();
            $product->prices()->save($old_price);
        }

        $product->prices()->save($price);

        return $product;
    }
}
