<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 21.12.2017
 * Time: 11:26
 */

namespace App\Http\Controllers\Api;


use App\Produkt;
use App\Ocena;
use App\Http\Resources\Produkt as ProduktResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function gradeProduct(Request $request, $productId)
    {
        $product = Produkt::findOrFail($productId);

        $grade = new Ocena;

        $grade->ocena = $request->input("ocena");
        $grade->id_produkt = $productId;
        $grade->id_uporabnik = $request->input("id_uporabnik");

        $product->grades()->save($grade);

        return new ProduktResource($product);
    }

}