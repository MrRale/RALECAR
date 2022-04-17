<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClienteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         //si esta iniciado sesion y tiene el rol de cliente entonces de paso a la ruta que busca
         if(auth()->check() && (auth()->user()->hasRole('Cliente') || auth()->user()->hasRole('Administrador')) ) 
         return $next($request);
          else
        
            //sino redirigir a login
        return redirect()->route('login');
    }
}
