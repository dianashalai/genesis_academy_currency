<?php

namespace App\Contracts\Services;

interface CurrencyServiceInterface
{
    public function getExchangeRate(string $fromCurrency, string $toCurrency): ?float;
}
