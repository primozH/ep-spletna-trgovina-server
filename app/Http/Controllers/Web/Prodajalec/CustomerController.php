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
            "uporabnisko_ime" => "required|unique:uporabnik",
            "email" => "required",
            "tel_stevilka" => "nullable",
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

        $user->ime = $request->input("ime");
        $user->priimek = $request->input("priimek");
        $user->uporabnisko_ime = $request->input("uporabnisko_ime");
        $user->email = $request->input("email");
        $user->tel_stevilka = $request->input("tel_stevilka");
        $user->naslov = $request->input("naslov");

        if ($request->has("geslo"))
            $user->geslo = password_hash($request->input("geslo"), PASSWORD_BCRYPT);

        $user->save();

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