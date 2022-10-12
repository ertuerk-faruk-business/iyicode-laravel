<?php

namespace IyiCode\App\Services\CMS;

use Illuminate\Support\Facades\Cache;
use IyiCode\App\Services\CMS;

class Application
{
    /**
     * Get application from current token.
     */
    public static function get(): array|null
    {
        $cache = Cache::get(CMS::getToken() . '_cms_iyicode_application_get');

        if (!empty($cache)) {
            return $cache;
        }

        $response = CMS::getHttpRequest()->get('https://cms.iyicode.com/api/application');

        if (!$response->ok()) {
            return null;
        }

        $data = $response->json();

        if (($data['status'] ?? 'error') == 'error') {
            return null;
        }

        Cache::put(CMS::getToken() . '_cms_iyicode_application_get', $data, now()->addHour());

        return $data;
    }
}
