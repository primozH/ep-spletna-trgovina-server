<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 7.1.2018
 * Time: 15:35
 */

namespace App\Http\Controllers\Web\Admin;


use App\Dnevnik;
use App\Http\Controllers\Controller;
use App\Uporabnik;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function details(Request $request) {
        $sales = Uporabnik::find($request->session()->get("adminId"));
        $logs = Dnevnik::where("id_uporabnik", $request->session()->get("adminId"))->limit(50)->orderBy("datum_cas", "desc")->get();

        return view("admin.posodobi_administrator", ["admin" => $sales, "logs" => $logs]);
    }

    public function updateProfile(Request $request) {
        $sales = Uporabnik::find($request->session()->get("adminId"));

        $sales->ime = htmlspecialchars($request->get("ime"));
        $sales->priimek = htmlspecialchars($request->get("priimek"));
        if ($request->has("geslo") and $request->has("geslo_rep")) {
            if ($request->get("geslo") == $request->get("geslo_rep")) {
                $sales->geslo = password_hash(htmlspecialchars($request->get("geslo")), PASSWORD_BCRYPT);
            } else {
                return response()->redirectTo("/admin/profil");
            }
        }

        $sales->save();

        return redirect("/admin");
    }

}