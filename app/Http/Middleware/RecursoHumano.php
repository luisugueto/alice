<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Session;
use Closure;


class RecursoHumano
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
        if($request->user()->roles_id != 4)
            abort(403, 'Acceso Denegado');
        return $next($request);
    }
}
