<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if($request->user()->role !== 'admin'){
            return redirect()                
                ->route('dashboard.index')
                ->with('msg_error', 'Você não tem privilégios para isso.');
                
        }
        return $next($request);
    }
}
