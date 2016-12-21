<?php

namespace App\Http\Middleware;

use Closure;

class Usuarios
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
        if($request->user()->roles_id != 1 && $request->user()->roles_id != 2)
            abort(403, 'Acceso Denegado');
        return $next($request);
    }
}
