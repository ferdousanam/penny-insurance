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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
Auth::routes([ 'register' => false ]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace' => 'Admin', 'middleware' => ['auth']], function () {
//    Route::get('/test', function () {
//        return Auth::user()->role_id;
//    });
    Route::resource('/user', 'UserController');
    Route::resource('/profile', 'ProfileController');
});


