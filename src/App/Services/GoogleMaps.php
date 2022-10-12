<?php

namespace IyiCode\App\Services;

class GoogleMaps
{
    public static function accept(): void
    {
        session(['google_maps_accepted' => true]);
    }

    public static function reject(): void
    {
        session(['google_maps_accepted' => false]);
    }

    public static function isAccepted(): bool
    {
        return session('google_maps_accepted', false);
    }
}
