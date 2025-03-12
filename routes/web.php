<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Nilu;

Route::get('/', function () {
    return view('app');
});
