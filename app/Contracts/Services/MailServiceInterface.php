<?php
namespace App\Contracts\Services;

interface MailServiceInterface
{
    public static function sendCurrencyRateEmail(string $email, string $from, string $to, float $rate): void;
}
