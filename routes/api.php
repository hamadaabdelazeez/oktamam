<?php

use Illuminate\Http\Request;

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

Route::get('companies','ApiController@companies');
Route::get('employees','ApiController@employees');
Route::get('company/{company}','ApiController@company');
Route::get('employee/{employee}','ApiController@employee');

//Route::post('login','Auth\LoginController@api_login');



