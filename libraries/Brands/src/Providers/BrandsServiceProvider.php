<?php

namespace App\Modules\Brands\Providers;


use App\Modules\Brands\Middlewares\CheckAdmin;
use Illuminate\Support\ServiceProvider;

class BrandsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('modules', CheckAdmin::class)->name('CheckAdmin');

    }
}
