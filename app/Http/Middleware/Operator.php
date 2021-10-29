<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Operator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && ($user->role === 'Admin' || $user->role === 'Operator')){
            return $next($request);
        }

        return redirect()->route('home');
    }
}
