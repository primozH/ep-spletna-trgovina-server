<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 21.12.2017
 * Time: 11:26
 */

namespace Api\Http\Controllers;


use Api\Produkt;
use Api\Ocena;
use Api\Http\Resources\Produkt as ProduktResource;
use Illuminate\Http\Request;

class GradeController
{
    public function gradeProduct(Request $request, $productId)
    {
        $product = Produkt::findOrFail($productId);

        $grade = new Ocena;

        $grade->ocena = $request->input("grade");
        $grade->id_produkt = $productId;
        $grade->id_uporabnik = $request->input("accountId");

        $grade->save();

        return new ProduktResource($product);
    }
}