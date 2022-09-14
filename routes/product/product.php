<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\ProductController;

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index']);
});
