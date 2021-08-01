<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV', 'local') != 'local') {     
            if (strpos(request()->fullUrl(), 'http://') !== false) {
                return redirect(str_replace('http://', 'https://', request()->fullUrl()));
            }
            $this->app['request']->server->set('HTTPS', true);
            URL::forceScheme('https');
        }

        Inertia::share('flash', function () {
            return [
                'success' => Session::get('success'),
                'error' => Session::get('error'),
            ];
        });
    }
}
