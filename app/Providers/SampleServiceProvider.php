<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Test;
class SampleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('test', function() {
            return new Test('Naing');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
