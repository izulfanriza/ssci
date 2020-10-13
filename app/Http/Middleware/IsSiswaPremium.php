<?php

namespace App\Http\Middleware;

use Closure;

class IsSiswaPremium
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
        if (auth()->check() && $request->user()->role == 'siswapremium'){
            return $next($request);
        } else {
            return redirect()->guest('dashboard');
        }
        
    }
}
