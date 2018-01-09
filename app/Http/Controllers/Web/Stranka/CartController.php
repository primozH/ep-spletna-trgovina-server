<?php

namespace App\Http\Controllers\Web\Stranka;

use App\Http\Controllers\Controller;
use App\Kosarica;
use App\Produkt;
use App\Uporabnik;
use Illuminate\Http\Request;
use App\Http\Resources\Kosarica as KosaricaResource;

class CartController extends Controller
{
    public function showCart(Request $request)
    {
        $id_uporabnik = $request->session()->get("userId");
        $items = Kosarica::where("id_uporabnik", $id_uporabnik)->get();

        $cartItems = array();
        foreach($items as $item) {
            $cartItems[] = [
                "id_produkt" => $item->id_produkt,
                "naziv" => $item->product->naziv,
                "cena" => $item->product->currentPrice()->cena,
                "valuta" => $item->product->currentPrice()->valuta,
                "kolicina" => $item->kolicina,
            ];
        }

        return view("stranka.kosarica", ["items" => $cartItems]);
    }

    public function showOffer(Request $request)
    {
        $id_uporabnik = $request->session()->get("userId");
        $items = Kosarica::where("id_uporabnik", $id_uporabnik)->get();

        $cartItems = array();
        $sum = 0;
        foreach($items as $item) {
            $sum += $item->product->currentPrice()->cena;
            $cartItems[] = [
                "id_produkt" => $item->id_produkt,
                "naziv" => $item->product->naziv,
                "cena" => $item->product->currentPrice()->cena,
                "valuta" => $item->product->currentPrice()->valuta,
                "kolicina" => $item->kolicina,
            ];
        }

        return view("stranka.predracun", ["items" => $cartItems, "sum" => $sum]);
    }

    public function addToCart(Request $request)
    {
        $temp = $request->validate([
            "id_produkt" => "required",
            "kolicina" => "nullable",
        ]);

        $produkt = Produkt::findOrFail($temp["id_produkt"]);

        $id_uporabnik = $request->session()->get("userId");
        $uporabnik = Uporabnik::find($id_uporabnik);

        $cart = Kosarica::where([
            ["id_uporabnik", $id_uporabnik],
            ["id_produkt", $produkt->id_produkt]])->first();


        if (!is_null($cart))
        {
            Kosarica::where([
                ["id_uporabnik", $id_uporabnik],
                ["id_produkt", $produkt->id_produkt]
            ])->update(["kolicina" => array_key_exists("kolicina", $temp) ? $temp["kolicina"] : $cart->kolicina + 1]);

        } else {
            $item = new Kosarica;
            $item->id_produkt = $produkt->id_produkt;
            $item->kolicina = array_key_exists("kolicina", $temp) ? $temp["kolicina"] : 1;

            $uporabnik->cartItems()->save($item);
        }

        $cartItems = $uporabnik->cartItems()->get();

        return response(["items" => KosaricaResource::collection($cartItems)]);
    }

    public function getCart(Request $request)
    {
        $userid = $request->session()->get("userId");

        $cartItems = Kosarica::where("id_uporabnik", $userid)->get();
        return response(["items" => KosaricaResource::collection($cartItems)]);
    }

    public function removeFromCart(Request $request, $id) {
        Kosarica::where("id_produkt", $id)->delete();

        return response("", 204);
    }
}
