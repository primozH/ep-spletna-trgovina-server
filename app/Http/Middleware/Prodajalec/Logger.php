<?php

namespace App\Http\Middleware\Prodajalec;

use App\Dnevnik;
use Closure;

class Logger
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
        $log_text = $request->fullUrl() . ", ip. " . $request->ip() . ", cookie: " . implode(" ", $request->cookie());
        $log = new Dnevnik;
        $log->opis = $log_text;
        $log->tip = $request->method();
        $log->id_uporabnik = $request->session()->get("salesId");

        $log->save();

        return $next($request);
    }
}
