<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSSL
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
        if(env('APP_ENV', 'local') != 'local'){
            if (strpos(request()->fullUrl(), 'https://') == false) {
                return redirect(str_replace('http://', 'https://', request()->fullUrl()));
            } else {
                return $next($request);
            }
        } else {
            return $next($request);
        }  
    }
}
