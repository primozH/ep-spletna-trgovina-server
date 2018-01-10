<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 6.1.2018
 * Time: 8:56
 */

namespace App\Http\Controllers\Web\Prodajalec;


use App\Http\Controllers\Controller;
use App\Uporabnik;
use App\Vloga;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        return view("prodajalec.prijava_prodajalec");
    }

    public function verifyLogin(Request $request)
    {
        $data = $request->validate([
            "geslo" => "required",
        ]);

        $email = $_SERVER["REDIRECT_SSL_CLIENT_S_DN_Email"];
        $uporabnik = Uporabnik::where("email", $email)->first();

        $vloga = Vloga::where("naziv", "prodajalec")->first();

        if ($uporabnik) {
            $uporabnikVloga = $uporabnik->roles()->where("id_vloga", $vloga->id_vloga)->first();
            if ($uporabnikVloga) {

                if (password_verify(htmlspecialchars($data["geslo"]), $uporabnik->geslo)) {
                    $request->session()->put("salesId", $uporabnik->id_uporabnik);
                    return redirect("/prodaja");
                }
            }
        }

        return view("prodajalec.prijava_prodajalec", []);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return view("prodajalec.odjava");
    }

}