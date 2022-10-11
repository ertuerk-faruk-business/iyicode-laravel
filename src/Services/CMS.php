<?php

namespace IyiCode\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class CMS
{
    private $applicationToken;

    public function __construct(mixed $applicationToken)
    {
        $this->applicationToken = $applicationToken;
    }

    public static function get(mixed $applicationToken): CMS
    {
        return new CMS($applicationToken);
    }

    public function visitor(mixed $ip = null): array|null
    {
        $cache = $this->getCachedVisitor($ip);

        if (!empty($cache)) {
            return $cache;
        }

        $response = Http::withHeaders([
            'X-IYICMS-APPLICATION-TOKEN' => $this->applicationToken,
        ])->post('https://cms.iyicode.com/api/application/analytics/save', [
            'visitor' => $ip ?? Request::ip(),
        ]);

        if (!$response->ok()) {
            return null;
        }

        $data = $response->json();

        if ($data['status'] ?? 'error' == 'error') {
            return null;
        }

        $formattedIp = str_replace('.', '_', $ip);

        Cache::put('cms_iyicode_analytics_visitor_' . $formattedIp, $data, now()->addHour());

        return $data;
    }

    private function getCachedVisitor(mixed $ip): array|null
    {
        $formattedIp = str_replace('.', '_', $ip);

        $cache = Cache::get('cms_iyicode_analytics_visitor_' . $formattedIp) ?? null;

        if (empty($cache)) {
            return null;
        }

        return $cache;
    }
}
