<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 27.12.2017
 * Time: 21:43
 */

namespace App\Http\Controllers\Api;

use App\EmailPotrditev;
use App\Uporabnik;
use App\Http\Controllers\Controller;
use App\UporabnikVloga;
use App\Vloga;
use Dotenv\Validator;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsTrue;

class LoginController extends Controller
{
    public function verifyLogin(Request $request)
    {
        $data = $request->validate([
            "email" => "required",
            "geslo" => "required",
        ]);

        $uporabnik = Uporabnik::where("email", htmlspecialchars($data["email"]))
            ->where("potrjen", true)
            ->first();
        if (!$uporabnik)
        {
            return response()->json([
                'error' => true,
                'uporabnik' => null
            ]);
        }

        $vloga = Vloga::where("naziv", "stranka")->first();
        $vloga_uporabnik = UporabnikVloga::where("id_uporabnik", $uporabnik->id_uporabnik)
            ->where("id_vloga", $vloga->id_vloga)
            ->first();
        if (!$vloga_uporabnik)
        {
            return response()->json([
                'error' => true,
                'uporabnik' => null
            ]);
        }

        if ($uporabnik) {
            if (password_verify(htmlspecialchars($data["geslo"]), $uporabnik->geslo)) {
                $request->session()->put("userId", $uporabnik->id_uporabnik);
                return response()->json([
                    'error' => false,
                    'uporabnik' => $uporabnik
                ]);
            }
            return response()->json([
                'error' => true,
                'uporabnik' => null
            ]);
        }
        return response()->json([
            'error' => true,
            'uporabnik' => null
        ]);
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
        $user->ime = htmlspecialchars($data["ime"]);
        $user->priimek = htmlspecialchars($data["priimek"]);
        $user->email = htmlspecialchars($data["email"]);
        $user->naslov = htmlspecialchars($data["naslov"]);
        $user->tel_stevilka = htmlspecialchars($data["tel_stevilka"]);


        if ($data["geslo"] != "" and $data["geslo_staro"] != "" and $data["geslo"] == $data["geslo_rep"]) {
            if (password_verify(htmlspecialchars($data["geslo_staro"]), $user->geslo)) {
                $user->geslo = password_hash(htmlspecialchars($data["geslo"]), PASSWORD_BCRYPT);
            } else {
                return response() -> json([
                    'error' => false,
                    "uporabnik" => null
                ]);
            }
        }

        $user->save();
        return response()->json([
            'error' => false,
            'uporabnik' => $user
        ]);
    }

    public function getUser(Request $request) {
        $userId = $request->session()->get("userId");

        $user = Uporabnik::find($userId);
        return view("stranka.posodobi_stranka", ["stranka" => $user]);
    }

    public function login(Request $request)
    {
        $uporabnik = Uporabnik::where('email', $request->input('email'))->first();

        if (count($uporabnik)) {
            if (password_verify($request->input('geslo'), $uporabnik->geslo)) {
                unset($uporabnik->geslo);
                return response()->json([
                    'error' => false,
                    'uporabnik' => $uporabnik
                ]);
            }
            else {
                return response()->json([
                    'error' => true,
                    'message' => 'Invalid password'
                ]);
            }
        }
        else {
            return response()->json([
                'error' => true,
                'message' => 'User not exist'
            ]);
        }

        /*$uporabnisko_ime = $request->input("uporabnisko_ime");
        $geslo = $request->input("geslo");

        $uporabnik = Uporabnik::where("uporabnisko_ime", $uporabnisko_ime)->first();

        if ($uporabnik) {
            if (password_verify($geslo, $uporabnik->geslo)) {
                /* generate token
                $token = 1;
                return response()->json([
                    "success" => true,
                    "data" => [
                        "token" => $token
                    ]
                ]);
            }
        }

        return response()->json([
            "success" => false,
            "error" => "Wrong username/password"
        ]);*/
    }

    public function register(Request $request)
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

        $user = $this->create($data);

        $verification_code = str_random(30);
        $email_token = new EmailPotrditev;
        $email_token->zeton = $verification_code;
        $email_token->id_uporabnik = $user->id_uporabnik;

        /* SEND MAIL */

        return response()->json(["uspesno" => true, "sporocilo" => "Hvala za registracijo!"
            ." Prosimo preverite e-poštni nabiralnik, da zaključite postopek registracije."]);
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

    public function verifyUser($token)
    {
        $check = EmailPotrditev::where("zeton", $token)->first();

        if (!is_null($check)) {
            $user = Uporabnik::find($check->id_uporabnik);

            if ($user->potrjen == 1) {
                return response()->json([
                    "success" => true,
                    "sporocilo" => "Racun je ze bil potrjen"
                ]);
            }

            $user->potrjen = 1;
            $user->save();

            $check->delete();

            return response()->json([
                "success" => true,
                "message" => "Račun uspešno potrjen!"
            ]);
        }

        return response()->json([
            "success" => false,
            "error" => "Potrditvena koda je napačna!"
        ]);
    }

}