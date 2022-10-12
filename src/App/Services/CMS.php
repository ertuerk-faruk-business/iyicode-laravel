<?php

namespace IyiCode\App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class CMS
{
    private static $applicationToken;

    /**
     * Set application token for requests.
     */
    public static function setup(mixed $applicationToken): void
    {
        self::$applicationToken = $applicationToken;
    }

    /**
     * Get PrendingRequest with header.
     */
    public static function getHttpRequest(): PendingRequest
    {
        return Http::withHeaders([
            'X-IYICMS-APPLICATION-TOKEN' => self::$applicationToken,
        ]);
    }

    /**
     * Current application token.
     */
    public static function getToken(): mixed
    {
        return self::$applicationToken;
    }
}
