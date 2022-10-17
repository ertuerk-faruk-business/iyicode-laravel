<?php

namespace IyiCode\App\Http\Controllers;

use IyiCode\App\Http\Controllers\Controller;
use IyiCode\App\Services\Account;

class AccountController extends Controller
{
    public function index()
    {
        $token =  request()->token;

        if ($token != null) {
            Account::get($token);
        }

        return redirect('/');
    }
}
