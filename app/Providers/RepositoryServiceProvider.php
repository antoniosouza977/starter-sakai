<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(\App\Repositories\IncomeRepository::class, \App\Repositories\IncomeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\IncomeCategoryRepository::class, \App\Repositories\IncomeCategoryRepositoryEloquent::class);
        //:end-bindings:
    }
}
