<?php

namespace Api\Http\Controllers;

use Api\Cenik;
use Illuminate\Http\Request;
use Api\Produkt;
use Api\Http\Resources\Produkt as ProduktResource;

const DEFAULT_TIME = "2099-01-01";

class ProductController extends Controller
{

    public function index() {
        $products = Produkt::all();
        return view('index', $products);
    }

    public function showDetailsForProduct($productId) {
        $product = Produkt::find($productId);
        $data = [
            "product_name" => $product->naziv,
            "product_description" => $product->opis,
            "product_price" => $product->currentPrice()->cena,
            "images" => $product->images()
        ];
        return view('product_details', $data);
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
