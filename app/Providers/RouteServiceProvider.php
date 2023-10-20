<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web','auth', 'role:office'])
                ->prefix('office')
                ->as('office.')
                ->namespace($this->namespace)
                ->group(base_path('routes/office.php'));

            Route::middleware(['web','auth', 'role:checker'])
                ->prefix('checker')
                ->as('checker.')
                ->namespace($this->namespace)
                ->group(base_path('routes/checker.php'));

            Route::middleware(['web','auth', 'role:cashier'])
                ->prefix('cashier')
                ->as('cashier.')
                ->namespace($this->namespace)
                ->group(base_path('routes/cashier.php'));

            Route::middleware(['web','auth', 'role:manager'])
                ->prefix('manager')
                ->as('manager.')
                ->namespace($this->namespace)
                ->group(base_path('routes/manager.php'));

            Route::middleware(['web','auth', 'role:admin'])
                ->prefix('admin')
                ->as('admin.')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));
        });
    }
}
