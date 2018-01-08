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
        return view("stranka.kosarica", ["items" => $items]);
    }

    public function addToCart(Request $request)
    {
        $temp = $request->validate([
            "id_produkt" => "required"
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
            ])->update(["kolicina" => $cart->kolicina + 1]);

        } else {
            $item = new Kosarica;
            $item->id_produkt = $produkt->id_produkt;
            $item->kolicina = 1;

            $uporabnik->cartItems()->save($item);
        }

        $cartItems = $uporabnik->cartItems()->get();

        return response(["items" => KosaricaResource::collection($cartItems)]);
    }
}
