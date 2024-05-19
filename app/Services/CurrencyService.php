<?php

declare(strict_types=1);
namespace App\Services;

use App\Contracts\Services\CurrencyServiceInterface;
use App\Models\ExchangeRate;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class CurrencyService implements CurrencyServiceInterface
{

    private ?string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('EXCHANGE_RATE_API_URL');
    }

    public function getExchangeRate($fromCurrency,$toCurrency): ?float
    {
        $rate = ExchangeRate::where('from_currency', $fromCurrency)
            ->where('to_currency', $toCurrency)
            ->latest()
            ->first();

        if ($rate) {
            return intval($rate->rate);
        }

        $response = Http::get("{$this->apiUrl}/pair/{$fromCurrency}/{$toCurrency}");

        if ($response->ok()) {
            $data = $response->json();
            $rate = $data['conversion_rate'] ?? null;

            if ($rate) {
                ExchangeRate::create([
                    'from_currency' => $fromCurrency,
                    'to_currency' => $toCurrency,
                    'rate' => $rate,
                ]);
            }

            return $rate;
        }

        return null;
    }
}
