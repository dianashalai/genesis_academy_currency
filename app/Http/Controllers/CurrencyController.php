<?php

namespace App\Http\Controllers;

use App\Contracts\Services\CurrencyServiceInterface;
use App\Repositories\ExchangeRateRepository;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    private const USD_CURRENCY = 'USD';
    private const UAH_CURRENCY = 'UAH';
    public function __construct(
        private CurrencyServiceInterface $currencyService,
        private ExchangeRateRepository   $exchangeRateRepository,
    ) {}

    public function exchange(Request $request)
    {
        try {
            $request->validate([
                'convert_from' => 'required|string',
                'convert_to' => 'required|string',
            ]);


            $from = $request->get('convert_from');
            $to = $request->get('convert_to');

            $rate = $this->exchangeRateRepository->getFreshExchangeRateByPair($from, $to);

            if (!is_null($rate)) {
                return response()->json(['type' => $rate->getAttribute('rate')]);
            }

            return response()->json(['type' => $this->currencyService->getExchangeRate($from, $to)]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

    }

    public function fixedRate(Request $request)
    {
        try {
            $rate = $this->exchangeRateRepository->getFreshExchangeRateByPair(self::USD_CURRENCY, self::UAH_CURRENCY);

            if (!is_null($rate)) {
                return response()->json(['type' => $rate->getAttribute('rate')]);
            }

            return response()->json(['type' => $this->currencyService->getExchangeRate(self::USD_CURRENCY, self::UAH_CURRENCY)]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}

