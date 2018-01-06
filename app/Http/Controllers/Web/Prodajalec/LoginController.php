<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 6.1.2018
 * Time: 8:56
 */

namespace App\Http\Controllers\Web\Prodajalec;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        return view("prodajalec.prijava_prodajalec");
    }

    public function verifyLogin(Request $request) {
        return redirect("/prodaja");
    }

}