<?php

namespace App\Contracts\Services;

use App\Models\Subscriber;

interface SubscribeServiceInterface
{
    public function subscribeUser(string $email, string $fromCurrency, string $toCurrency): Subscriber;
}
