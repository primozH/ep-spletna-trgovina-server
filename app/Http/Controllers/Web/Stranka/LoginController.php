<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 27.12.2017
 * Time: 21:43
 */

namespace App\Http\Controllers\Web\Stranka;

use App\Uporabnik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login()
    {
        return view("stranka.prijava_stranka");
    }

    public function register()
    {
        return view("stranka.registracija_stranka");
    }

    public function verifyLogin(Request $request)
    {
        $uporabnisko_ime = $request->input("uporabnisko_ime");
        $geslo = $request->input("geslo");

        $uporabnik = Uporabnik::where("uporabnisko_ime", $uporabnisko_ime)->first();
        if ($uporabnik) {
            if ($uporabnik->geslo == bcrypt($geslo))
                return response()->redirectTo("/");
            else
                return view("stranka.prijava_stranka", ["error" => "Napačno uporabniško ime ali geslo"]);
        }

        return view("stranka.prijava_stranka");
    }

    public function verifyRegister(Request $request)
    {
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

        $this->create($data);
        return response()->redirectTo("/");
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
            'geslo' => bcrypt($data['geslo']),
        ]);
    }

}