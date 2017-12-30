<?php

namespace App\Http\Controllers\Web\Stranka;

use App\Http\Controllers\Controller;
use App\Produkt;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart(Request $request)
    {
        if($request->session()->exists("kosarica")) {
            $items = $request->session()->get("kosarica");
        } else {
            $items = ["items" => array()];
        }
        return view("stranka.kosarica", $items);
    }

    public function addToCart(Request $request)
    {
        $temp = $request->validate([
            "id_produkt" => "required"
        ]);

        $temp = Produkt::findOrFail($temp["id_produkt"]);

        $izdelek = [
            "id" => $temp->id_produkt,
            "naziv" => $temp->naziv,
            "cena" => $temp->currentPrice()->cena,
            "kolicina" => 1,
            "valuta" => $temp->currentPrice()->valuta
        ];


        if(!$request->session()->exists("kosarica")) {
            $request->session()->put("kosarica", array());
        }

        $request->session()->push("kosarica.items", $izdelek);



        return response($request->session()->get("kosarica"));
    }
}
