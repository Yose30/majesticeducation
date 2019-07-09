<?php

namespace App\Http\Middleware;

use Closure;

class TipoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $tipo)
    {
        if(auth()->user()->tipo_id != $tipo){
            abort(401, __("No puedes acceder a este sitio"));
        }
        return $next($request);
    }
}
