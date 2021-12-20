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
use Modules\Advertisement\Http\Controllers\UserAdvertisementController;

/////////////////      Advertisements          ////////////////////////
Route::resource('/advertisements', 'AdvertisementController');
Route::prefix('advertisements')->group(function() {

    Route::get('/activation/{id}','AdvertisementController@activate');
    Route::get('/delete/{id}','AdvertisementController@destroy');

});

Route::middleware(['auth'])->group(function () {

    Route::prefix('advertisement')->group(function () {
        Route::get('/all', [UserAdvertisementController::class , 'getAllAdvertisement'])->name('all.advertisement');

        Route::get('/{id}', [UserAdvertisementController::class , 'showAdvertisement'])->name('show.advertisement');
    });
});

