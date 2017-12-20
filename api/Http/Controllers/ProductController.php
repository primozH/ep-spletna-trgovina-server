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
        return view('index');
    }

    public function retrieveProducts() {
        $products = Produkt::all();
        return ProduktResource::collection($products);
    }

    public function retrieveProduct($id) {
        $product = Produkt::find($id);
        return new ProduktResource($product);
    }

    public function show_details_for_product($product_category, $product_id) {
        $product_name = "Prenosni računalnik ASUS ROG";
        return view('product_details', ["product_name" => $product_name]);
    }

    public function createProduct(Request $req) {
        $product = new Produkt;
        $product->naziv = $req->input("produkt.naziv");
        $product->opis = $req->input("produkt.opis");

        $product->save();

        $this->insertNewPriceForProduct($product, $req->json("produkt.cena"), $req->json("produkt.valuta"));
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
