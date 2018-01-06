<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 6.1.2018
 * Time: 14:16
 */

namespace App\Http\Controllers\Web\Prodajalec;


use App\Http\Controllers\Controller;
use App\Uporabnik;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function details(Request $request) {

        return view("prodajalec.posodobi_prodajalec", []);
    }

    public function updateProfile(Request $request) {


        return redirect("/prodaja");
    }

}