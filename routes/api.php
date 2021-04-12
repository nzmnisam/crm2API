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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('stages', 'App\Http\Controllers\StageController@index')->middleware('isLoggedIn');
// ->middleware(['first', 'second']);
Route::get('stages/{stage}', 'App\Http\Controllers\StageController@show')->middleware('isLoggedIn');

Route::get('staff','App\Http\Controllers\StaffController@index')->middleware(['isLoggedIn', 'isManager']);;
Route::get('staff/{staff}','App\Http\Controllers\StaffController@show')->middleware(['isLoggedIn', 'isManager']);;
// Route::post('staff','App\Http\Controllers\StaffController@store');
Route::put('staff/{staff}','App\Http\Controllers\StaffController@update')->middleware(['isLoggedIn', 'isManager']);;
Route::delete('staff/{staff}','App\Http\Controllers\StaffController@delete')->middleware(['isLoggedIn', 'isManager']);;
Route::post('staff/login','App\Http\Controllers\StaffController@login');
Route::post('staff/register','App\Http\Controllers\StaffController@register')->middleware(['isLoggedIn', 'isManager']);

Route::get('contacts','App\Http\Controllers\ContactController@index')->middleware('isLoggedIn');
Route::get('contacts/detailed','App\Http\Controllers\ContactController@indexJoin')->middleware('isLoggedIn');
Route::get('contacts/{contact}','App\Http\Controllers\ContactController@show')->middleware('isLoggedIn');
Route::post('contacts','App\Http\Controllers\ContactController@store')->middleware('isLoggedIn');
Route::put('contacts/{contact}','App\Http\Controllers\ContactController@update')->middleware('isLoggedIn');
Route::delete('contacts/{contact}','App\Http\Controllers\ContactController@delete')->middleware('isLoggedIn');
