<?php

namespace App\Http\Controllers\Web\Stranka;

use App\Http\Controllers\Controller;
use App\Uporabnik;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(Request $request) {
        $userId = $request->session()->get("userId");

        $user = Uporabnik::find($userId);
        return view("stranka.posodobi_stranka", ["stranka" => $user]);
    }

    public function updateUser(Request $request) {
        $data = $request->validate([
            "ime" => "required",
            "priimek" => "required",
            "email" => "required|email",
            "naslov" => "required",
            "tel_stevilka" => "nullable",
            "geslo_staro" => "nullable",
            "geslo" => "nullable",
            "geslo_rep" => "nullable",
        ]);

        $userId = $request->session()->get("userId");

        $user = Uporabnik::find($userId);
        $user->ime = $data["ime"];
        $user->priimek = $data["priimek"];
        $user->email = $data["email"];
        $user->naslov = $data["naslov"];
        $user->tel_stevilka = $data["tel_stevilka"];

        if ($data["geslo"] != null and $data["geslo_staro"] != null and $data["geslo"] == $data["geslo_rep"]) {
            if (password_verify($data["geslo_staro"], $user->geslo)) {
                $user->geslo = password_hash($data["geslo"], PASSWORD_BCRYPT);
            } else {
                return view("stranka.posodobi_stranka", ["stranka" => Uporabnik::find($userId), "error" => "Nepravilno izpolnjena polja!"]);
            }
        }

        $user->save();
        return response()->redirectTo("/");
    }


}
