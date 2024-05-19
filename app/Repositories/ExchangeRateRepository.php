<?php
namespace App\Repositories;

use App\Contracts\Repositories\ExchangeRateRepositoryInterface;
use App\Models\ExchangeRate;
use Carbon\Carbon;

class ExchangeRateRepository extends BaseRepository implements ExchangeRateRepositoryInterface
{
    public function getFreshExchangeRateByPair($fromCurrency, $toCurrency): ?ExchangeRate
    {
        return ExchangeRate::where('from_currency', $fromCurrency)
            ->where('to_currency', $toCurrency)
            ->where('updated_at', '>', Carbon::now()->subHour(24))
            ->first();
    }

    public function firstOrCreate(string $fromCurrency, string $toCurrency): ExchangeRate
    {
        return ExchangeRate::firstOrCreate(['from_currency' => $fromCurrency, 'to_currency' => $toCurrency]);
    }
}
