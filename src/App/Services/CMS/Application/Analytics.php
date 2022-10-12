<?php

namespace IyiCode\App\Services\CMS\Application;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use IyiCode\App\Services\CMS;

class Analytics
{
    /**
     * Save visitor in cms and get visitor info.
     */
    public static function visitor(mixed $ip = null): array|null
    {
        $cache = Cache::get(self::getVisitorCacheKey($ip)) ?? null;

        if (!empty($cache)) {
            return $cache;
        }

        $response = CMS::getHttpRequest()->post('https://cms.iyicode.com/api/application/analytics/save', [
            'visitor' => $ip ?? Request::ip(),
        ]);

        if (!$response->ok()) {
            return null;
        }

        $data = $response->json();

        if (($data['status'] ?? 'error') == 'error') {
            return null;
        }

        Cache::put(self::getVisitorCacheKey($ip), $data, now()->addHour());

        return $data;
    }

    private static function getVisitorCacheKey(mixed $ip): string
    {
        $formattedIp = str_replace('.', '_', $ip);
        $formattedIp = str_replace('::', '_x_x_', $formattedIp);
        $formattedIp = str_replace(':', '_x_', $formattedIp);

        return CMS::getToken() . '_cms_iyicode_analytics_visitor_' . $formattedIp;
    }
}
