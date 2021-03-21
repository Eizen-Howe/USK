<?php

namespace App\Http\Middleware;

use Closure;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($role == 'admin'&& auth()->user()->role == 'admin'){
            return $next($request);
        }
        else if ($role == 'petugas' && auth()->user()->role == 'petugas') {
            return $next($request);
        }
        else if ($role == 'user' && auth()->user()->role == 'user') {
            return $next($request);
        }
        return back();
    }
}
