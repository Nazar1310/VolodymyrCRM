<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index');
Route::get('/customers', 'App\Http\Controllers\IndexController@customers')->name('customers');
Route::get('/search/{field}/', 'App\Http\Controllers\IndexController@search')->name('search');
Route::group(['prefix' => '/profile'], function(){
    Route::get('/', 'App\Http\Controllers\IndexController@users')->name('users');
    Route::get('/edit/{user}', 'App\Http\Controllers\IndexController@editUsers')->name('users-edit');
    Route::post('/edit/{user}', 'App\Http\Controllers\IndexController@editSubmitUsers');
    Route::get('/edit-password/{user}', 'App\Http\Controllers\IndexController@editPassword')->name('users-edit-password');
    Route::post('/edit-password/{user}', 'App\Http\Controllers\IndexController@updatePassword');
});
Route::get('/zadarma-webhook', 'App\Http\Controllers\ZadarmaController@webhook');
Auth::routes();
