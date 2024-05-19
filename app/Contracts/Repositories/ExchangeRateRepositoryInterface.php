<?php

namespace App\Contracts\Repositories;

use App\Models\ExchangeRate;

interface ExchangeRateRepositoryInterface
{
    public function getFreshExchangeRateByPair($fromCurrency, $toCurrency): ?ExchangeRate;
    public function firstOrCreate(string $fromCurrency, string $toCurrency): ExchangeRate;

}
