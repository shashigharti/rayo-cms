<?php
namespace Robust\RealEstate\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Robust\RealEstate\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => ['web', 'auth', 'admin'],
        ], function ($router) {
            foreach (glob(base_path() . '/packages/robust/core/routes/admin/*') as $file) {
                if (!is_dir($file)) {
                    require $file;
                }
            }
        });
        
        Route::group([
            'middleware' => 'web',
        ], function ($router) {
            foreach (glob(base_path() . '/packages/robust/real-estate/routes/website/*') as $file) {
                if (!is_dir($file)) {
                    require $file;
                }
            }
        });
        Route::group([
            'middleware' => ['web', 'api'],
        ], function ($router) {
            foreach (glob(base_path() . '/packages/robust/real-estate/routes/api/*') as $file) {
               if (!is_dir($file)) {
                    require $file;
                }
            }
        });
    }
}
