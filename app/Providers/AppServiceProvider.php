<?php

namespace CodingTask\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		if(env('APP_ENV') !== 'local') { 
			$url->forceSchema('https'); 
		}
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        require_once __DIR__.'/../Http/helpers.php';
    }
}
