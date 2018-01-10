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
use GuzzleHttp\Client;
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

        $uporabnik = Uporabnik::where("email", htmlspecialchars($data["email"]))->first();

        if ($uporabnik) {
            if (password_verify(htmlspecialchars($data["geslo"]), $uporabnik->geslo)) {
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
            "email" => "required|unique:uporabnik",
            "tel_stevilka" => "nullable",
            "naslov" => "required",
            "geslo" => "required|size:8",
            "g-recaptcha-response" => "required",
        ]);

        if (!$this->verifyCAPTCHA($data["g-recaptcha-response"]))
            return view("stranka.registracija_stranka", ["error" => "Napaka pri captchi. Prosim osveži stran."]);

        $user = $this->create($data);

        $verification_code = str_random(30);
        $email_token = new EmailPotrditev;
        $email_token->zeton = $verification_code;
        $email_token->id_uporabnik = $user->id_uporabnik;

        /* SEND MAIL */

        return view("stranka.status_registracija", ["uspesno" => true, "sporocilo" => "Hvala za registracijo!"
            ." Prosimo preverite e-poštni nabiralnik, da zaključite postopek registracije."]);
    }

    protected function verifyCAPTCHA($token) {
        $client = new Client;

        $response = $client->post("https://www.google.com/recaptcha/api/siteverify?secret=" .
            env("CAPTCHA_KEY") . "&response=" . $token);

        if($response->getStatusCode() == 200) {
            $body = $response->getBody();
            $data = json_decode($body);

            if ($data->success) {
                return true;
            }
        }
        return false;
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