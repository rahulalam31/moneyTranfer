<?php

use App\Http\Controllers\HomeController;
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

Route::permanentRedirect('/', '/admin/home/');

Route::post('/data', 'App\Http\Controllers\HomeController@data');

Route::group(['prefix' => 'admin'], function () {
    //settings
    Route::get('/home', 'App\Http\Controllers\HomeController@index');
    Route::controller(App\Http\Controllers\AdminController::class)->group(function () {
        Route::get('/activate-sending-country/{countryId}', 'activateSendingCountry');
        Route::get('/deactivate-sending-country/{countryId}', 'deactivateSendingCountry');

        Route::get('/activate-recieving-country/{countryId}', 'activateRecievingCountry');
        Route::get('/deactivate-recieving-country/{countryId}', 'deactivateRecievingCountry');


        Route::get('getsendingcountry', 'getsendingcountry');
        Route::get('getsendingcountrycreate', 'getsendingcountrycreate');
        Route::get('getsendingcountrydelete/{countryId}', 'getsendingcountrydelete');
        Route::post('getsendingcountrysave', 'getsendingcountrysave');



        Route::get('getrecievingcountry', 'getrecievingcountry');
        Route::get('getrecievingcountrycreate', 'getrecievingcountrycreate');
        Route::get('getrecievingcountrydelete/{countryId}', 'getrecievingcountrydelete');
        Route::post('getrecievingcountrysave', 'getrecievingcountrysave');


        Route::get('getconversionrate', 'getconversionrate');
        Route::get('getconversionratecreate', 'getconversionratecreate');
        Route::get('getconversionratedelete/{ID}', 'getconversionratedelete');
        Route::post('getconversionratesave', 'getconversionratesave');


        Route::get('getcustomrate', 'getcustomrate');
        Route::get('getcustomratecreate', 'getcustomratecreate');
        Route::get('getcustomratedelete/{ID}', 'getcustomratedelete');
        Route::post('getcustomratesave', 'getcustomratesave');
    });
});
