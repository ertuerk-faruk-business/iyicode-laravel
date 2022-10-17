<?php

namespace IyiCode\App\Services;

use Illuminate\Support\Facades\Http;
use IyiCode\App\Services\Account\User;

class Account
{
    private static mixed $user = null;

    public static function auth()
    {
        $user = self::get();

        if (!empty($user)) {
            return null;
        }

        $token = session('iyicode_account_token');

        $callback = route('iyicode.account.callback');

        if ($token == null) {
            return redirect('https://account.iyicode.com/api/auth?callback=' . $callback);
        }

        return redirect('https://account.iyicode.com/api/auth?token=' . $token . '&&callback=' . $callback);
    }

    public static function get($token = null)
    {
        if (!empty(self::$user)) {
            return self::$user;
        }

        if ($token != null) {
            session([
                'iyicode_account_token' => $token,
            ]);
        } else {
            $token = session('iyicode_account_token');
        }

        if ($token == null) {
            return;
        }

        $response = Http::get('https://account.iyicode.com/api/account/get?token=' . $token);

        if (!$response->ok()) {
            return;
        }

        $data = $response->json();

        if (empty($data)) {
            return;
        }

        self::$user = new User($data);

        return self::$user;
    }
}
