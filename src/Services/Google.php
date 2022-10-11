<?php

namespace IyiCode\Services;

class Google
{
    private static bool $withAdsense = false;
    private static bool $withMaps = false;

    public static function withAdsense(): void
    {
        self::$withAdsense = true;
    }

    public static function hasAdsense(): bool
    {
        return self::$withAdsense;
    }

    public static function withMaps(): void
    {
        self::$withMaps = true;
    }

    public static function hasMaps(): bool
    {
        return self::$withMaps;
    }
}
