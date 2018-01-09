<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 6.1.2018
 * Time: 8:56
 */

namespace App\Http\Controllers\Web\Admin;


use App\Http\Controllers\Controller;
use App\Uporabnik;
use App\Vloga;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        return view("admin.prijava_administrator");
    }

    public function verifyLogin(Request $request)
    {
        $data = $request->validate([
            "geslo" => "required",
        ]);

        $email = $_SERVER["REDIRECT_SSL_CLIENT_S_DN_Email"];
        $uporabnik = Uporabnik::where("email", $email)->first();

        $vloga = Vloga::where("naziv", "admin")->first();

        if ($uporabnik) {
            $uporabnikVloga = $uporabnik->roles()->where("id_vloga", $vloga->id_vloga)->first();
            if ($uporabnikVloga) {

                if (password_verify($data["geslo"], $uporabnik->geslo)) {
                    $request->session()->put("adminId", $uporabnik->id_uporabnik);
                    return redirect("/admin");
                }
            }
        }

        return view("admin.prijava_administrator", []);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return view("admin.odjava");
    }

}