<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'],  function () {
    Route::get('/about/data-protection', 'IyiCode\App\Http\Controllers\DataProtectionController@index')->name('iyicode.data-protection.index');
});
