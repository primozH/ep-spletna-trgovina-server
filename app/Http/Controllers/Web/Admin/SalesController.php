<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 7.1.2018
 * Time: 13:30
 */

namespace App\Http\Controllers\Web\Admin;


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

        if ($role)
            return view("admin.prodajalec", ["prodajalec" => $salesman]);
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

        $salesman->ime = $request->input("ime");
        $salesman->priimek = $request->input("priimek");
        $salesman->email = $request->input("email");
        $salesman->geslo = password_hash($request->input("geslo"), PASSWORD_BCRYPT);

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

        $salesman->ime = $data["ime"];
        $salesman->priimek = $data["priimek"];
        $salesman->email = $data["email"];
        $salesman->aktiviran = $data["aktiviran"];

        if ($data["geslo"] != null) {
            $salesman->geslo = password_hash($data["geslo"], PASSWORD_BCRYPT);
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