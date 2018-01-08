<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 3.1.2018
 * Time: 16:24
 */

namespace App\Http\Controllers\Web\Stranka;


use App\EmailPotrditev;
use App\Http\Controllers\Controller;
use App\Uporabnik;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class LoginController extends Controller
{

    public function login()
    {
        return view("stranka.prijava_stranka");
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect("/");
    }

    public function register()
    {
        return view("stranka.registracija_stranka");
    }

    public function verifyLogin(Request $request)
    {
        $data = $request->validate([
            "email" => "required",
            "geslo" => "required",
        ]);

        $uporabnik = Uporabnik::where("email", $data["email"])->first();

        if ($uporabnik) {
            if (password_verify($data["geslo"], $uporabnik->geslo)) {
                $request->session()->put("userId", $uporabnik->id_uporabnik);
                return redirect("/");
            }
        }

        return view("stranka.prijava_stranka", []);
    }

    public function verifyRegister(Request $request)
    {
        $data = $request->validate([
            "ime" => "required",
            "priimek" => "required",
            "email" => "required",
            "tel_stevilka" => "nullable",
            "naslov" => "required",
            "geslo" => "required"
        ]);

        $user = $this->create($data);

        $verification_code = str_random(30);
        $email_token = new EmailPotrditev;
        $email_token->zeton = $verification_code;
        $email_token->id_uporabnik = $user->id_uporabnik;

        /* SEND MAIL */

        return view("stranka.status_registracija", ["uspesno" => true, "sporocilo" => "Hvala za registracijo!"
            ." Prosimo preverite e-poštni nabiralnik, da zaključite postopek registracije."]);
    }

    protected function create(array $data)
    {
        return Uporabnik::create([
            'ime' => $data['ime'],
            'priimek' => $data['priimek'],
            "email" => $data["email"],
            "tel_stevilka" => $data["tel_stevilka"],
            "naslov" => $data["naslov"],
            'geslo' => password_hash($data['geslo'], PASSWORD_BCRYPT),
        ]);
    }

}