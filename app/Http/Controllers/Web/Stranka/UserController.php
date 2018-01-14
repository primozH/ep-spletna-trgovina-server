<?php

namespace App\Http\Controllers\Web\Stranka;

use App\Http\Controllers\Controller;
use App\Uporabnik;
use Illuminate\Http\Request;

class UserController extends Controller
{

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
        $user->ime = htmlspecialchars($data["ime"]);
        $user->priimek = htmlspecialchars($data["priimek"]);
        $user->email = htmlspecialchars($data["email"]);
        $user->naslov = htmlspecialchars($data["naslov"]);
        $user->tel_stevilka = htmlspecialchars($data["tel_stevilka"]);

        if ($data["geslo"] != "" and $data["geslo_staro"] != "" and $data["geslo"] == $data["geslo_rep"]) {
            if (password_verify(htmlspecialchars($data["geslo_staro"]), $user->geslo)) {
                $user->geslo = password_hash(htmlspecialchars($data["geslo"]), PASSWORD_BCRYPT);
            } else {
                return view("stranka.posodobi_stranka", ["stranka" => Uporabnik::find($userId), "error" => "Nepravilno izpolnjena polja!"]);
            }
        }

        $user->save();
        return response()->redirectTo("/");
    }


}
