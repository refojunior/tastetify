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
            if (strpos(request()->fullUrl(), 'http://') !== false) {
                return redirect(str_replace('http://', 'https://', request()->fullUrl()));
            }
        }
        return $next($request);
    }
}
