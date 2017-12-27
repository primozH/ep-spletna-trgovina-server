<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 27.12.2017
 * Time: 21:43
 */

namespace App\Http\Controllers;


class LoginController
{

    public function login()
    {
        return view("stranka.prijava_stranka");
    }

    public function register()
    {
        return view("stranka.registracija_stranka");
    }
}