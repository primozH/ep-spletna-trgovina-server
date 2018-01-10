<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 6.1.2018
 * Time: 12:50
 */

namespace App\Http\Controllers\Web\Prodajalec;


use App\Http\Controllers\Controller;
use App\Uporabnik;
use App\UporabnikVloga;
use App\Vloga;
use Illuminate\Http\Request;
use Mockery\Exception;

class CustomerController extends Controller
{

    public function showCustomers()
    {

        $role = Vloga::where("naziv", "stranka")->get()->first();
        $customers = UporabnikVloga::where("id_vloga", $role->id_vloga)->select("id_uporabnik")->get();
        $custom = Uporabnik::find($customers);

        return view("prodajalec.pregled_strank_prodajalec",  ["stranke" => $custom]);
    }

    public function showCustomer(Request $request, $id)
    {
        $customer = Uporabnik::find($id);

        return view("prodajalec.posodobi_stranko_prodajalec", ["stranka" => $customer]);
    }

    public function addCustomer(Request $request) {
        return view("prodajalec.posodobi_stranko_prodajalec", []);
    }

    public function createCustomer(Request $request) {
        $data = $request->all();

        $data = $request->validate([
            "ime" => "required",
            "priimek" => "required",
            "email" => "required|unique: uporabnik",
            "tel_stevilka" => "required",
            "naslov" => "required",
            "geslo" => "required"
        ]);

        $user = $this->create($data);

        $role = new UporabnikVloga;
        $role->id_vloga = Vloga::where("naziv", "stranka")->get()->first()->id_vloga;

        $user->roles()->save($role);

        return response()->redirectTo("/prodaja/stranke");

    }

    protected function updateCustomer(Request $request, $id) {

        $user = Uporabnik::find($id);

        $data = $request->validate([
            "ime" => "required",
            "priimek" => "required",
            "email" => "required",
            "tel_stevilka" => "required",
            "naslov" => "required",
            "geslo" => "nullable"
        ]);

        $user->ime = $data["ime"];
        $user->priimek = $data["priimek"];
        $user->email = $data["email"];
        $user->tel_stevilka = $data["tel_stevilka"];
        $user->naslov = $data["naslov"];

        if ($request->has("geslo"))
            $user->geslo = password_hash($data["geslo"], PASSWORD_BCRYPT);

        try {

            $user->save();
        } catch (Exception $e) {
            return view("prodajalec.posodobi_stranko_prodajalec", ["error" => "Napaka pri posodabljanju"]);
        }

        return response()->redirectTo("/prodaja/stranke");
    }

    protected function create(array $data)
    {
        return Uporabnik::create([
            'ime' => $data['ime'],
            'priimek' => $data['priimek'],
            "uporabnisko_ime" => $data["uporabnisko_ime"],
            "email" => $data["email"],
            "tel_stevilka" => $data["tel_stevilka"],
            "naslov" => $data["naslov"],
            'geslo' => password_hash($data['geslo'], PASSWORD_BCRYPT),
        ]);
    }

}