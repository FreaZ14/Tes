<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FooBarServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });
    
        $this->app->singleton(Bar::class, function ($app) {
            return new Bar();
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
