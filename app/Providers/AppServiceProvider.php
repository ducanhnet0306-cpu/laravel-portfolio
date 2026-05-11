<?php

declare(strict_types=1);

namespace App\Providers;

use App\Data\PortfolioData;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PortfolioData::class, function () {
            return PortfolioData::fromConfig();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Make the portfolio view-model available to every view as $portfolio.
        View::composer('*', function ($view) {
            $view->with('portfolio', app(PortfolioData::class));
        });
    }
}
