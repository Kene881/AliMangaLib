<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    //protected $namespace = 'App\\Http\\Controllers';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', 'role:admin'])
                ->prefix('admin')
                ->name('news.')
                ->group(base_path('routes/adminNews.php'));

            Route::middleware('web')
                ->prefix('news')
                ->name('news.')
                ->group(base_path('routes/news.php'));

//            Route::middleware('web')
//                ->namespace($this->namespace)
//                ->group(base_path('routes/forum.php'));

            Route::middleware(['web', 'role:admin'])
                ->group(base_path('routes/adminManga.php'));

            Route::middleware('web')
                ->group(base_path('routes/manga.php'));
        });
    }


    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
