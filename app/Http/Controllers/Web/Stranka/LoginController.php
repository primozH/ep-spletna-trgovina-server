<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 3.1.2018
 * Time: 16:24
 */

namespace App\Http\Controllers\Web\Stranka;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function registerVerify()
    {
        return view("stranka.prijava_stranka");
    }

}