<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 7.1.2018
 * Time: 15:35
 */

namespace App\Http\Controllers\Web\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function loginPage(Request $request)
    {
        return view("admin.prijava_administrator", []);
    }

    public function login(Request $request)
    {
        return response()->redirectTo("/admin");
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return response()->redirectTo("/admin/prijava");
    }

}