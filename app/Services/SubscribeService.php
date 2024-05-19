<?php

declare(strict_types=1);
namespace App\Services;

use App\Contracts\Repositories\ExchangeRateRepositoryInterface;
use App\Contracts\Repositories\SubscriberRepositoryInterface;
use App\Contracts\Services\SubscribeServiceInterface;
use App\Models\Subscriber;

class SubscribeService implements SubscribeServiceInterface
{
    public function __construct(
        private ExchangeRateRepositoryInterface $exchangeRateRepository,
        private SubscriberRepositoryInterface $subscriberRepository,
    ) {}
    public function subscribeUser(string $email, string $fromCurrency, string $toCurrency): Subscriber
    {
        $rate = $this->exchangeRateRepository->firstOrCreate($fromCurrency, $toCurrency);

        return $this->subscriberRepository->createSubscriber($email, $rate);
    }
}
