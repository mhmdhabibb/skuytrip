<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailControllers;



Route::get('/detail', function () {
    return view('detail');
});
Route::get('/', function () {
    return view('welcome');
});
