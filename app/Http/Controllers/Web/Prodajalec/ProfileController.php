<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 6.1.2018
 * Time: 14:16
 */

namespace App\Http\Controllers\Web\Prodajalec;


use App\Http\Controllers\Controller;
use App\Uporabnik;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function details(Request $request) {
        $sales = Uporabnik::find($request->session()->get("salesId"));

        return view("prodajalec.posodobi_prodajalec", ["prodajalec" => $sales]);
    }

    public function updateProfile(Request $request) {
        $sales = Uporabnik::find($request->session()->get("salesId"));

        $sales->ime = htmlspecialchars($request->get("ime"));
        $sales->priimek = htmlspecialchars($request->get("priimek"));
        if ($request->has("geslo") and $request->has("geslo_rep")) {
            if ($request->get("geslo") == $request->get("geslo_rep")) {
                $sales->geslo = password_hash(htmlspecialchars($request->get("geslo")), PASSWORD_BCRYPT);
            } else {
                return response()->redirectTo("/prodaja/profil");
            }
        }

        $sales->save();

        return redirect("/prodaja");
    }

}