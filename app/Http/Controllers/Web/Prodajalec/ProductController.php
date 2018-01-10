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
use Illuminate\Support\Facades\Storage;

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
            "cena" => "required|numeric",
            "veljavno_do" => "required|date"
        ]);

        $product->naziv = htmlspecialchars($data["naziv"]);
        $product->opis = htmlspecialchars($data["opis"]);
        $product->save();

        $price = new Cenik;

        $price->cena = htmlspecialchars($data["cena"]);
        $price->veljavno_do = htmlspecialchars($data["veljavno_do"]);

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
            $new_price->veljavno_do = htmlspecialchars($request->input("veljavno_do"));
            $new_price->cena = (float)htmlspecialchars($request->input("cena"));

            $product->prices()->save($new_price);
        }

        if ($request->has("naziv")) {
            $product->naziv = htmlspecialchars($request->input("naziv"));
        }

        if ($request->has("opis")) {
            $product->opis = htmlspecialchars($request->input("opis"));
        }

        $product->aktiviran = htmlspecialchars($request->input("aktiviran"));

        $product->save();

        return response()->redirectTo("/prodaja/izdelki/");
    }

    public function uploadImage(Request $request, $id)
    {

        $product = Produkt::find($id);
        $data = $request->validate([
            "slika" => "image|max:2000"
        ]);

        $file_name = $request->file("slika")->getClientOriginalName();
        $file_ext = $request->file("slika")->getClientOriginalExtension();
        $path = "public/images/" . $file_name;

        $path = $request->file('slika')->storeAs(
            'images/', $file_name, 'public');

        $image = new Slika;
        $image->pot = Storage::url($path);
        $image->alias = $product->naziv . date("Y-m-d");
        $image->zap_st = $product->images()->count() + 1;

        $product->images()->save($image);

        return response()->redirectTo("/prodaja/izdelki");
    }
}