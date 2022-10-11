<?php

namespace IyiCode\Services;

class GoogleAdsense
{
    public static function accept(): void
    {
        session(['google_adsense_accepted' => true]);
    }

    public static function reject(): void
    {
        session(['google_adsense_accepted' => false]);
    }

    public static function isAccepted(): bool
    {
        return session('google_adsense_accepted', false);
    }
}
