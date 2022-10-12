<?php

use Illuminate\Support\Facades\Route;

Route::get('/about/data-protection', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index');
