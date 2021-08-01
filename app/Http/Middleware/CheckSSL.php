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
            if (isset($_SERVER['HTTPS']) &&
                ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
                isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
                $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
                return $next($request);
            }
            else {
                return redirect(env('APP_URL').$request->path());
            }
        } else {
            return $next($request);
        }  
    }
}
