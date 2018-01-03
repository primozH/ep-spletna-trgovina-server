<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Produkt as ProduktResource;
use App\models\Kosarica;
use App\Uporabnik;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function getCart(Request $request)
    {
        $id = $request->header("userid");

        $cart = Uporabnik::findOrFail($id)->cartItems();

        $products = array();

        foreach ($cart as $item)
        {
            $products[] = $item->product();
        }

        return ProduktResource::collection($products);
    }

    public function addToCart(Request $request)
    {
        $temp = $request->validate([
            "id_produkt" => "required"
        ]);

        $id_uporabnik = $request->header("userid");

        $cart = Uporabnik::findOrFail($id_uporabnik)->cartItems()->select("id_produkt");
        $item = new Kosarica;
        $item->id_uporabnik = $id_uporabnik;
        $item->id_produkt = $temp["id_produkt"];

        $index = array_search($temp["id_produkt"], $cart);
        if ($index)
        {
            $cart[$index]->kolicina +=1;
        }

        $item->save();

        return response($item);
    }
}
