<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'],  function () {
    if (!empty(env('IYICODE_SETTINGS_PASSWORD'))) {
        Route::get('/iyicode/settings', 'IyiCode\App\Http\Controllers\SettingsController@index')->name('iyicode.settings.index');
    }

    Route::get('/about/data-protection', 'IyiCode\App\Http\Controllers\DataProtectionController@index')->name('iyicode.data-protection.index');
    Route::get('/iyicode/account/callback', 'IyiCode\App\Http\Controllers\AccountController@index')->name('iyicode.account.callback');
});
