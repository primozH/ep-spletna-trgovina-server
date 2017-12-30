<?php

namespace App\Http\Controllers\Web\Stranka;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUser(Request $request) {
        return view("stranka.posodobi_stranka");
    }


}
