<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 6.1.2018
 * Time: 9:15
 */

namespace App\Http\Controllers\Web\Prodajalec;


use App\Cenik;
use App\Http\Controllers\Controller;
use App\Produkt;
use App\Slika;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function listProducts(Request $request) {
        $products = Produkt::all();

        return view("prodajalec.artikli_prodajalec", ["izdelki" => $products]);
    }

    public function showProduct(Request $request, $id) {
        $product = Produkt::find($id);

        return view("prodajalec.posodobi_artikel_prodajalec", ["izdelek" => $product]);
    }

    public function addProduct(Request $request) {
        return view("prodajalec.dodaj_artikel_prodajalec");
    }

    public function createProduct(Request $request) {

        $product = new Produkt;

        $data = $request->validate([
            "naziv" => "required",
            "opis" => "required",
            "cena" => "required|numeric|digits_between:1,8",
            "veljavno_do" => "required|date"
        ]);

        $product->naziv = $data["naziv"];
        $product->opis = $data["opis"];
        $product->save();

        $price = new Cenik;

        $price->cena = $data["cena"];
        $price->veljavno_do = $data["veljavno_do"];

        $product->prices()->save($price);

        return response()->redirectTo("/prodaja/izdelki");
    }

    public function updateProduct(Request $request, $id) {
        $product = Produkt::find($id);

        if ($request->has("cena") and $request->has("veljavno_do")) {
            $price = $product->currentPrice();
            $price->veljavno_do = date("Y-m-d");

            $price->save();

            $new_price= new Cenik;
            $new_price->veljavno_do = $request->input("veljavno_do");
            $new_price->cena = (float) $request->input("cena");

            $product->prices()->save($new_price);
        }

        if ($request->has("naziv")) {
            $product->naziv = $request->input("naziv");
        }

        if ($request->has("opis")) {
            $product->opis = $request->input("opis");
        }

        $product->save();

        return response()->redirectTo("/prodaja/izdelki/");
    }

    public function uploadImage(Request $request, $id)
    {
        $product = Produkt::find($id);

        $path = $request->file("slika")->storeAs("images", $product->naziv . date("Y-m-d"), "public");

        $image = new Slika;
        $image->pot = $path;
        $image->alias = $product->naziv . date("Y-m-d");
        $image->zap_st = $product->images()->count + 1;

        $product->images()->save($image);
    }
}