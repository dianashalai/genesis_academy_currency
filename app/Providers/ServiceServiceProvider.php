<?php

namespace App\Providers;

use App\Contracts\Services\CurrencyServiceInterface;
use App\Contracts\Services\SubscribeServiceInterface;
use App\Services\CurrencyService;
use App\Services\SubscribeService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CurrencyServiceInterface::class, CurrencyService::class);
        $this->app->bind(SubscribeServiceInterface::class, SubscribeService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
     //
    }
}
