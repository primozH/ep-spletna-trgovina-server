<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
        $this->mapSalesmanRoutes();
        //
    }


    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace . "\Api")
             ->group(base_path('routes/api.php'));
    }

    protected function mapWebRoutes()
    {
        Route::namespace($this->namespace . "\Web\Stranka")
            ->middleware("web")
            ->group(base_path("routes/web.php"));
    }

    protected function mapAdminRoutes()
    {
        Route::prefix("admin")
            ->middleware("admin")
            ->namespace($this->namespace . "\Web\Admin")
            ->group(base_path("routes/admin.php"));
    }

    protected function mapSalesmanRoutes()
    {
        Route::prefix("prodaja")
            ->middleware("sales")
            ->namespace($this->namespace . "\Web\Prodajalec")
            ->group(base_path("routes/sales.php"));
    }
}
