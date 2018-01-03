<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Uporabnik;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use JWTAuthException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->user = new Uporabnik;
    }

    public function login(Request $request){

        $credentials = $request->only('uporabnisko_ime', 'geslo');

        $jwt = '';

        try {
            if (!$jwt = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_credentials',
                ], 401);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ], 500);
        }
        return response()->json([
            'response' => 'success',
            'result' => ['token' => $jwt]
        ]);
    }

    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }
}
