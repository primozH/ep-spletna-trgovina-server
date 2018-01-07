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

class ProfileController extends Controller
{
    public function details(Request $request) {

        return view("admin.posodobi_administrator", []);
    }

    public function updateProfile(Request $request) {


        return redirect("/admin");
    }

}