<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Inertia::share([
            'previousUrl' => function () {
                if (url()->previous() === route('login') || url()->previous() === '') return 'empty';

                if (url()->previous() === url()->current()) {
                    return dirname(url()->previous());
                }

                return url()->previous();
            },
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') === 'prod') {
            URL::forceScheme('https');
        }
    }
}
