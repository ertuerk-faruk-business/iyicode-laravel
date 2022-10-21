<?php

namespace IyiCode\App\Http\Controllers;

use IyiCode\App\Http\Controllers\Controller;
use IyiCode\App\Services\Account;

class AccountController extends Controller
{
    public function index()
    {
        $token =  request()->token;
        $hash =  request()->hash;

        if ($token != null) {
            Account::token($token);
        }

        if ($hash != null) {
            Account::hash($hash);
        }

        Account::get();

        return redirect(config('iyicode.auth.callback.redirect', '/'));
    }
}
