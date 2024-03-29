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
Route::get('/utilisateurs','App\Http\Controllers\LoginController@show');
Route::delete('/logout','App\Http\Controllers\LoginController@logout');
// -------------------START MEDECINE------------------
Route::post('addMedecine','App\Http\Controllers\MedecineController@addMedecine');
Route::get('getMedecine','App\Http\Controllers\MedecineController@getMedecine');
Route::put('updateMedecine/{id}','App\Http\Controllers\MedecineController@updateMedecine');
Route::put('changeEtatOff/{id}','App\Http\Controllers\MedecineController@changeEtatOff');
Route::put('changeEtatOn/{id}','App\Http\Controllers\MedecineController@changeEtatOn');
Route::put('addStock/{id}','App\Http\Controllers\PurchaseController@addStock');

// ---------------------END MEDECINE----------------------

// -------------------------START STOCK------------------------
Route::post('addStock/{id}','App\Http\Controllers\StockController@addToStock');
Route::get('stock','App\Http\Controllers\StockController@getStock');
Route::put('deleteStock/{id}','App\Http\Controllers\StockController@deleteStock');
// ----------------------------END STOCK--------------------------

// ----------------------START REQUISITIONS---------------------
Route::post('addRequisition/{id}','App\Http\Controllers\RequisitionController@addRequisition');
Route::get('requisition','App\Http\Controllers\RequisitionController@getRequisition');
Route::get('requisitionVentes','App\Http\Controllers\RequisitionController@requisitionVentes');
Route::put('validateRequi/{id}','App\Http\Controllers\RequisitionController@validateRequi');
Route::put('deleteRequi/{id}','App\Http\Controllers\RequisitionController@deleteRequi');
Route::get('expiredRequi','App\Http\Controllers\RequisitionController@expiredRequi');
// ------------------------END REQUISITIONS-------------------------

//----------------------START PERTE------------------------------
Route::post('addPerte/{id}','App\Http\Controllers\PerteController@addPerte');
Route::get('pertes','App\Http\Controllers\PerteController@getPerte');
//-----------------------END PERTE------------------------------

//---------------------------START ORDERS-----------------------
Route::post('addOrder','App\Http\Controllers\OrderController@addOrder');
Route::post('deleteOrder/{id}','App\Http\Controllers\OrderController@deleteOrder');
Route::get('orders','App\Http\Controllers\OrderController@listOrders');
Route::get('lastId','App\Http\Controllers\OrderController@lastId');
Route::get('vente','App\Http\Controllers\VenteController@venteCart');
Route::get('order_details','App\Http\Controllers\OrderController@orderDetails');
Route::get('order_detail/{id}','App\Http\Controllers\OrderController@detailsById');
//------------------------------END ORDERS------------------

//------------------------------START STATS---------------------------
Route::get('stats','App\Http\Controllers\OrderController@stats');
//------------------------------END STATS-------------------------------

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/me','App\Http\Controllers\LoginController@me');
});

Route::get('products_detail/{id?}','App\Http\Controllers\MedecineController@detailProduit');
Route::post('saveData','App\Http\Controllers\MedecineController@saveData');