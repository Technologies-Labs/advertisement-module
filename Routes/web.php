<?php

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

use Illuminate\Support\Facades\Route;

/////////////////      Advertisements          ////////////////////////
Route::resource('/advertisements', 'AdvertisementController');
Route::prefix('advertisements')->group(function() {

    Route::get('/activation/{id}','AdvertisementController@activate');
    Route::get('/delete/{id}','AdvertisementController@destroy');

});

