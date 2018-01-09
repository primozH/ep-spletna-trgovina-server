<?php

namespace App\Http\Middleware\Prodajalec;

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
        if ($request->session()->has("salesId")) {
            return $next($request);
        }
        return response()->redirectTo("/prodaja/prijava");
    }
}
