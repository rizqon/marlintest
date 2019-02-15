<?php

use Illuminate\Http\Request;
use App\Libraries\Rajaongkir;

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

Route::get('kota', 'Api\OngkirApiController@getKota');

Route::get('provinsi', 'Api\OngkirApiController@getProvinsi');

Route::post('ongkir', 'Api\OngkirApiController@getOngkir');