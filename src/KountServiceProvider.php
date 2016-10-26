<?php

namespace Asanzred\Kount;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class KountServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // modify this if you want use internal routes and controller
        //$this->setupRoutes($this->app->router);
        
        
        //php artisan vendor:publish --provider="Asanzred\Kount\KountServiceProvider"
        $this->publishes([
                __DIR__.'/config/kount.php' => config_path('kount.php'),
        ]);

        $this->publishes([
        __DIR__.'/database/migrations/' => database_path('migrations')
        ], 'migrations');
        
        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(
            __DIR__.'/config/kount.php', 'kount'
        );
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Asanzred\Kount\Http\Controllers'], function($router)
        {
            require __DIR__.'/Http/routes.php';
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerKount();
        
        //use this if your package has a config file
        config([
                'config/kount.php',
        ]);
    }

    private function registerKount()
    {
        $this->app->bind('kount',function($app){
            return new Kount($app);
        });
    }
}