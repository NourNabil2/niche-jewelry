<?php

namespace App\Services;

class CurrencyService
{
    const RATE_USD_TO_KWD = 0.308;
    const RATE_KWD_TO_USD = 3.25;

    public static function current(): string
    {
        return session('currency', 'USD');
    }

    public static function set(string $currency): void
    {
        $currency = strtoupper($currency);
        if (in_array($currency, ['USD', 'KWD'])) {
            session(['currency' => $currency]);
        }
    }

    public static function format($amountUsd, $amountKwd = null, ?string $currency = null): string
    {
        $curr = $currency ?: self::current();

        if ($curr === 'KWD') {
            $val = $amountKwd !== null ? (float)$amountKwd : round((float)$amountUsd * self::RATE_USD_TO_KWD, 3);
            return number_format($val, 3) . ' د.ك';
        }

        $val = (float)$amountUsd;
        return '$' . number_format($val, 2);
    }

    public static function convertUsdToKwd($amountUsd): float
    {
        return round((float)$amountUsd * self::RATE_USD_TO_KWD, 3);
    }

    public static function convertKwdToUsd($amountKwd): float
    {
        return round((float)$amountKwd * self::RATE_KWD_TO_USD, 2);
    }
}
