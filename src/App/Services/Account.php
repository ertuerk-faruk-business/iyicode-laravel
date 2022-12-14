<?php

namespace IyiCode\App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class Account
{
    private static mixed $account = null;
    private static mixed $token = null;
    private static mixed $hash = null;
    private static array $cached = [];

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

    public static function hash(mixed $hash = null): mixed
    {
        if ($hash != null) {
            session([
                'iyicode_account_hash' => $hash,
            ]);

            self::$hash = $hash;
        }

        return self::$hash ?? session('iyicode_account_hash');
    }

    public static function forget()
    {
        session([
            'iyicode_account_token' => null,
        ]);

        session([
            'iyicode_account_hash' => null,
        ]);


        self::$token = null;
        self::$hash = null;
    }

    public static function auth()
    {
        $account = self::get();

        if (!empty($account)) {
            return null;
        }

        $token = self::token();
        $hash = self::hash();

        $callback = route('iyicode.account.callback');

        if ($token == null || $hash == null) {
            return redirect('https://account.iyicode.com/api/auth?ip=' . Request::ip() . '&&callback=' . $callback);
        }

        return redirect('https://account.iyicode.com/api/auth?token=' . $token ?? ''  . '&&ip=' . Request::ip() . '&&callback=' . $callback . '&&hash=' . $hash ?? '');
    }

    public static function get(): Account|null
    {
        if (!empty(self::$account)) {
            return self::$account;
        }

        $token = self::token();

        if ($token == null) {
            return null;
        }

        $hash = self::hash();

        if ($hash == null) {
            return null;
        }

        $response = Http::get('https://account.iyicode.com/api/account/get?token=' . $token . '&&ip=' . Request::ip() . '&&hash=' . $hash);

        if (!$response->ok()) {
            self::forget();
            return null;
        }

        $data = $response->json();

        if (empty($data)) {
            self::forget();
            return null;
        }

        self::$account = new Account($data);

        return self::$account;
    }

    public static function find(mixed $id): Account|null
    {
        if (self::isCached($id)) {
            return self::$cached[$id];
        }

        $accounts = self::query([
            'id' => $id,
        ], [
            'limit' => 1,
        ]);

        if (empty($accounts)) {
            return null;
        }

        return array_values($accounts)[0];
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

        if (empty($data)) {
            return [];
        }

        $result = [];

        foreach ($data as $key =>  $value) {
            $account = new Account($value);

            self::cache($account);

            $result[$value['id']] = $account;
        }

        return $result;
    }

    public static function for(mixed $related, string $key = 'user_id'): mixed
    {
        if (is_subclass_of($related, Model::class)) {
            return self::find($related->$key);
        }

        if (is_subclass_of($related, Collection::class)) {
            $related = $related->toArray();
        }

        if (is_array($related)) {
            $query = [];
            $cached = [];

            foreach ($related as $relatedKey => $relatedValue) {
                if (is_array($relatedValue)) {
                    $relatedValue = $relatedValue[$key] ?? null;
                }

                if ($relatedValue != null && !in_array($relatedValue, $query)) {
                    if (self::isCached($relatedValue)) {
                        array_push($cached, self::$cached[$relatedValue]);
                    }

                    array_push($query, $relatedValue);
                }
            }

            if (count($query) == count($cached)) {
                return $cached;
            }

            return self::query($query);
        }

        return null;
    }

    private static function isCached(mixed $id): bool
    {
        if ($id == null) {
            return false;
        }

        $id = strval($id);

        $result = self::$cached[$id] ?? null;

        return !empty($result);
    }

    private static function cache(Account $account)
    {
        self::$cached[$account->id()] = $account;
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

    public function toArray(): array
    {
        return $this->data;
    }
}
