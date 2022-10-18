<?php

namespace IyiCode\App\Http\Controllers;

use IyiCode\App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class SettingsController extends Controller
{
    public function index()
    {
        $password = request()->password;

        if (empty($password)) {
            return redirect('/');
        }

        if ($password != env('IYICODE_SETTINGS_PASSWORD')) {
            return redirect('/');
        }

        return view('iyicode::settings.base');
    }
}
