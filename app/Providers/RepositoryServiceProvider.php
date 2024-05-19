<?php

namespace App\Providers;

use App\Contracts\Repositories\ExchangeRateRepositoryInterface;
use App\Contracts\Repositories\SubscriberRepositoryInterface;
use App\Repositories\ExchangeRateRepository;
use App\Repositories\SubscriberRepository;
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
        $this->app->bind(SubscriberRepositoryInterface::class, SubscriberRepository::class);
        $this->app->bind(ExchangeRateRepositoryInterface::class, ExchangeRateRepository::class);

    }
}
