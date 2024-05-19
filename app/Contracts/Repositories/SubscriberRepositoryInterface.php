<?php

namespace App\Contracts\Repositories;

use App\Models\ExchangeRate;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Collection;

interface SubscriberRepositoryInterface
{
    public function getAllSubscribers(): Collection;

    public function createSubscriber(string $email, ExchangeRate $rate): Subscriber;
}
