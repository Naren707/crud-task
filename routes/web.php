<?php

use Illuminate\Support\Facades\Route;


Route::get('/products', 'App\Http\Controllers\ProductController@products')->name('products');
