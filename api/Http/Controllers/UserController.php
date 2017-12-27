<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 27.12.2017
 * Time: 16:57
 */

namespace Api\Http\Controllers;

use Api\Uporabnik;
use Illuminate\Http\Request;


class UserController
{
    public function login()
    {
        return view("login");
    }

    public function register()
    {
        return view("register");
    }
}