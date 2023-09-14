<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
//    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $this->mapApiRoutes();
//            $this->mapWebRoutes();
            $this->mapClientRoutes();
            $this->mapShopRoutes();
            $this->mapTransporterRoutes();
            $this->mapAdminRoutes();
        });
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
        Route::middleware('web')
             ->group(base_path('routes/web.php'));
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
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "client api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapClientRoutes()
    {
        // TODO: global scope to exclude content of shops having is_approved === false

        Route::prefix('api/client')
            ->as('client.')
            ->middleware('api')
            ->group(base_path('routes/client.php'));
    }

    /**
     * Define the "shop api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapShopRoutes()
    {
        Route::prefix('api/shop')
            ->as('shop.')
            ->middleware(['api'])
            ->group(base_path('routes/shop.php'));
    }

    /**
     * Define the "transporter api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapTransporterRoutes()
    {
        // TODO: global scope to exclude content of shops having is_approved === false

        Route::prefix('api/transporter')
            ->as('transporter.')
            ->middleware(['api'])
            ->group(base_path('routes/transporter.php'));
    }

    /**
     * Define the "admin api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::prefix('api/admin')
            ->as('admin.')
            ->middleware(['api'])
            ->group(base_path('routes/admin.php'));
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
