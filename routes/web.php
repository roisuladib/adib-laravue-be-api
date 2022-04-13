<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth'])
    ->group(function() {
        Route::get('/', 'AdminController@index')->name('/');
        Route::get('/product/{id}/gallery', 'ProductController@gallery')->name('product-gallery');
        Route::resource('/products', 'ProductController');
        Route::resource('/product-gallerries', 'ProductGalleryController');
        Route::resource('/transactions', 'TransactionController');
        Route::get('/transactions/{id}/setting-status', 'TransactionController@changeStatus')->name('transaction-status');
});

Auth::routes(['register' => false]);