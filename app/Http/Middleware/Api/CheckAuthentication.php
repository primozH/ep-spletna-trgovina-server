<?php

namespace App\Http\Middleware\Api;

use Closure;

class CheckAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has("userId")) {
            return $next($request);
        }
        return response()->json([
            "sporocilo" => "Nisi prijavljen",
        ], 401);
    }
}
