<?php

namespace IyiCode\App\Http\Controllers;

use IyiCode\App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class DataProtectionController extends Controller
{
    public function index()
    {
        App::setLocale('de');

        return view('iyicode::data-protection.base');
    }
}
