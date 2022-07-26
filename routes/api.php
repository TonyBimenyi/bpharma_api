<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register','App\Http\Controllers\RegisterController@register');
Route::post('/login','App\Http\Controllers\LoginController@login');
Route::delete('/logout','App\Http\Controllers\LoginController@logout');
// -------------------START MEDECINE------------------
Route::post('addMedecine','App\Http\Controllers\MedecineController@addMedecine');
Route::get('getMedecine','App\Http\Controllers\MedecineController@getMedecine');
Route::put('updateMedecine/{id}','App\Http\Controllers\MedecineController@updateMedecine');
Route::put('changeEtatOff/{id}','App\Http\Controllers\MedecineController@changeEtatOff');
Route::put('changeEtatOn/{id}','App\Http\Controllers\MedecineController@changeEtatOn');
Route::put('addStock/{id}','App\Http\Controllers\PurchaseController@addStock');
Route::post('addStock/{id}','App\Http\Controllers\StockController@addToStock');

// ---------------------END MEDECINE----------------------


Route::middleware('auth:sanctum')->group(function(){
    Route::get('/me','App\Http\Controllers\LoginController@me');
});
