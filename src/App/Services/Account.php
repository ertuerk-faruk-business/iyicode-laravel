<?php

namespace IyiCode\App\Services;

use Illuminate\Support\Facades\Http;

class Account
{
    private static mixed $account = null;
    private static mixed $token = null;

    private array $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Returns token from session if $token is empty
     * Saves token to session if $token is set
     */
    public static function token(mixed $token = null): mixed
    {
        if ($token != null) {
            session([
                'iyicode_account_token' => $token,
            ]);

            self::$token = $token;
        }

        return self::$token ?? session('iyicode_account_token');
    }

    public static function auth()
    {
        $account = self::get();

        if (!empty($account)) {
            return null;
        }

        $token = session('iyicode_account_token');

        $callback = route('iyicode.account.callback');

        if ($token == null) {
            return redirect('https://account.iyicode.com/api/auth?callback=' . $callback);
        }

        return redirect('https://account.iyicode.com/api/auth?token=' . $token . '&&callback=' . $callback);
    }

    public static function get()
    {
        if (!empty(self::$account)) {
            return self::$account;
        }

        $token = self::token();

        if ($token == null) {
            return null;
        }

        $response = Http::get('https://account.iyicode.com/api/account/get?token=' . $token);

        if (!$response->ok()) {
            return null;
        }

        $data = $response->json();

        if (empty($data)) {
            return null;
        }

        self::$account = new Account($data);

        return self::$account;
    }

    public static function find(mixed $id): Account|null
    {
        $accounts = self::query([
            'id' => $id,
        ], [
            'limit' => 1,
        ]);

        if (empty($accounts)) {
            return null;
        }

        return $accounts[0];
    }

    public static function query(array $query = [], array $options = []): array
    {
        $limit = $options['limit'] ?? 100;
        $offset = $options['offset'] ?? 0;

        $response = Http::post('https://account.iyicode.com/api/query', [
            'limit' => $limit,
            'offset' => $offset,
            'query' => $query,
        ]);

        if (!$response->ok()) {
            return [];
        }

        $data = $response->json();

        if (empty($data['accounts'])) {
            return [];
        }

        $result = [];

        foreach ($data['accounts'] as $key =>  $value) {
            $result[$value['id']] = new Account($value);
        }

        return $result;
    }

    public function firstName(): string
    {
        return $this->data['first_name'];
    }

    public function lastName(): string
    {
        return $this->data['last_name'];
    }

    public function image(): string|null
    {
        return $this->data['image'] ?? null;
    }

    public function userName(): string
    {
        return $this->data['user_name'];
    }

    public function email(): string
    {
        return $this->data['email'];
    }

    public function id(): string|int
    {
        return $this->data['id'];
    }
}
