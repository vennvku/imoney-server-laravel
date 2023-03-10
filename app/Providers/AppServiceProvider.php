<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('MyUser', function($app) {
        //     return new \App\Models\User;
        // });

        // $this->app->singleton('MyUser', function($app) {
        //     return new \App\Models\User;
        // });
    
        // $user = new \App\Models\User; // Khởi tạo object lần đầu
        // $this->app->instance('MyUser', $user);

        $this->app->when('App\Models\User')
          ->needs('$id')
          ->give(1);
    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
