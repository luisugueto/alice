<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Session;
use Closure;

class Administrador
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
       if($request->user()->roles_id != 1)
            abort(403, 'Acceso Denegado');
        return $next($request);
    }
}
