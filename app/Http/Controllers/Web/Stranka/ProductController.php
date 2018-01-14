<?php

namespace App\Http\Controllers\Web\Stranka;

use App\Cenik;
use App\Http\Controllers\Controller;
use App\Ocena;
use App\Uporabnik;
use Illuminate\Http\Request;
use App\Produkt;
use App\Http\Resources\Produkt as ProduktResource;
use Illuminate\Support\Facades\DB;

const DEFAULT_TIME = "2099-01-01";

class ProductController extends Controller
{

    public function index(Request $request) {
        $products = Produkt::where("aktiviran", true)->get();

        return view('stranka.index', ["products"=>$products]);
    }

    public function productDetails(Request $request, $izdelekId) {
        $product = Produkt::where("id_produkt", htmlspecialchars($izdelekId))->where("aktiviran", true)->first();

        $userId = $request->session()->has("userId") ? $request->session()->get("userId") : null;

        $grade = null;
        if (!empty($userId))
        {
            $grade = Ocena::where("id_uporabnik", $userId)->where("id_produkt", $product->id_produkt)->first();
        }

        return view('stranka.produkt_podrobno_stranka', ["product" => $product, "grade" => $grade]);
    }

    public function search(Request $request)
    {
        $search = $request->query->filter("search", "", FILTER_SANITIZE_SPECIAL_CHARS);
        $match = DB::select("SELECT * FROM produkt WHERE aktiviran = 1 AND MATCH(naziv) AGAINST (:search IN BOOLEAN MODE)",
            ["search" => $search]);

        $products = Produkt::hydrate($match);
        return view("stranka.index", ["products" => $products]);
    }

    public function gradeProduct(Request $request, $izdelekId)
    {
        $product = Produkt::where("id_produkt", $izdelekId)
                        ->where("aktiviran", true)
                        ->first();

        $data = $request->validate([
            "ocena" => "required|numeric|min:1|max:5"
        ]);

        if ($product) {
            $grade = new Ocena;
            $grade->ocena = $data["ocena"];
            $grade->id_uporabnik = $request->session()->get("userId");
            $grade->id_produkt = $product->id_produkt;
            $grade->save();

        }

        return response()->redirectTo("/izdelki/" . $product->id_produkt);
    }
}
