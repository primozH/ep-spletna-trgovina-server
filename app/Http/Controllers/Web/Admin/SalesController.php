<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 7.1.2018
 * Time: 13:30
 */

namespace App\Http\Controllers\Web\Admin;


use App\Dnevnik;
use App\Http\Controllers\Controller;
use App\Uporabnik;
use App\UporabnikVloga;
use App\Vloga;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function listSalesmen() {

        $role = Vloga::where("naziv", "prodajalec")->get()->first();
        $ids = UporabnikVloga::where("id_vloga", $role->id_vloga)->select("id_uporabnik")->get();
        $active = Uporabnik::find($ids)->where("aktiviran", true);
        $nonActive = Uporabnik::where("aktiviran", false)->find($ids);

        return view("admin.index_administrator", ["prodajalci" => $active,
                                                        "neaktivni" => $nonActive]);

    }

    public function getSalesman(Request $request, $id)
    {
        $salesman = Uporabnik::findOrFail($id);

        $sale = Vloga::where("naziv", "prodajalec")->get()->first();
        $role = UporabnikVloga::where([
            ["id_vloga", $sale->id_vloga],
            ["id_uporabnik", $salesman->id_uporabnik]
        ])->get()->first();

        $logs = Dnevnik::where("id_uporabnik", $id)->get();

        if ($role)
            return view("admin.prodajalec", ["prodajalec" => $salesman, "logs" => $logs]);
        else
            return abort(404);
    }

    public function addSalesman(Request $request)
    {
        return view("admin.prodajalec", ["prodajalec" => null]);
    }

    public function createSalesman(Request $request)
    {
        $salesman = new Uporabnik;

        $salesman->ime = htmlspecialchars($request->input("ime"));
        $salesman->priimek = htmlspecialchars($request->input("priimek"));
        $salesman->email = htmlspecialchars($request->input("email"));
        $salesman->geslo = password_hash(htmlspecialchars($request->input("geslo")), PASSWORD_BCRYPT);

        $salesman->save();

        $this->addRole($salesman);

        return response()->redirectTo("/admin/prodajalci/" . $salesman->id_uporabnik);
    }

    public function updateSalesman(Request $request, $id)
    {
        $salesman = Uporabnik::findOrFail($id);

        $data = $request->validate([
            "ime" => "required",
            "priimek" => "required",
            "email" => "required",
            "geslo" => "nullable",
            "aktiviran" => "required",
        ]);

        $salesman->ime = htmlspecialchars($data["ime"]);
        $salesman->priimek = htmlspecialchars($data["priimek"]);
        $salesman->email = htmlspecialchars($data["email"]);
        $salesman->aktiviran = htmlspecialchars($data["aktiviran"]);

        if ($data["geslo"] != "") {
            $salesman->geslo = password_hash(htmlspecialchars($data["geslo"]), PASSWORD_BCRYPT);
        }

        $salesman->save();

        return response()->redirectTo("/admin");
    }

    private function addRole($salesman)
    {
        $role = Vloga::where("naziv", "prodajalec")->get()->first();
        $salesRole = new UporabnikVloga;

        $salesRole->id_vloga = $role->id_vloga;

        $salesman->roles()->save($salesRole);

        return;
    }

}