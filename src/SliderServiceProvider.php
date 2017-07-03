<?php

namespace Pratik\Slider;

use Illuminate\Support\ServiceProvider;

class SliderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
      $this->loadViewsFrom(__DIR__.'/view', 'slider');
      $this->loadRoutesFrom(__DIR__.'/routes.php');

      $this->publishes([
        __DIR__.'/public' => public_path('vendor/pratik/slider'),
    ], 'public');
      
    // Publish your migrations
    $this->publishes([
        __DIR__.'/migrations/' => database_path('/migrations')
    ], 'migrations');

    $this->publishes([
        __DIR__.'/view' => resource_path('views/vendor/pratik/slider'),
    ]);

    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Pratik\Slider\Controller\SliderController');
    }
}
