<?php

namespace IyiCode\App\Services\Account;

class User
{
    private array $data = [];

    public function __construct(mixed $data)
    {
        if ($data != null) {
            $this->data = $data;
        }
    }

    public function firstName(): string
    {
        return $this->data['first_name'];
    }

    public function lastName(): string
    {
        return $this->data['last_name'];
    }

    public function image(): string
    {
        return $this->data['image'];
    }

    public function userName(): string
    {
        return $this->data['user_name'];
    }

    public function email(): string
    {
        return $this->data['email'];
    }
}
