<?php

namespace IyiCode\App\Services;

class Layout
{
    public static function getHead(): array
    {
        $result = [];

        if (Google::hasAdsense() && GoogleAdsense::isAccepted()) {
            $clientID = env("IYICODE_GOOGLE_ADSENSE_CLIENT_ID");

            if (!empty($clientID)) {
                array_push($result, ('<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=' . $clientID . '" crossorigin="anonymous"></script>'));
            }
        }

        return $result;
    }

    public static function shouldAcceptCookies(): bool
    {
        if (Google::hasMaps() && !GoogleMaps::isAccepted()) {
            return true;
        }

        if (Google::hasAdsense() && !GoogleAdsense::isAccepted()) {
            return true;
        }

        return false;
    }
}
