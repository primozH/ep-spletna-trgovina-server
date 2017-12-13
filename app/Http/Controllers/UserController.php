<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request) {
        if ($request->isMethod('post')) {
            
        } else {
            return view('login');
        }
    }

    public function register(Request $request) {
        if ($request->isMethod('post')) {
            // handle register atempt
        } else {
            return view('register');
        }
    }
}
