<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventBackHistory
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
        $responce = $next($request);


        return $responce->header('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate')
                    ->header('Pragma', 'no-cache')
                    ->header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
    }
}
