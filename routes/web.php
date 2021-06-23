<?php

// use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//         return view('home.welcome');
//     });


Route::get( '/', 'App\Http\Controllers\tabelController@index');

Route::get('/connect', 'App\Http\Controllers\tabelController@connect');
Route::get('/showadd', 'App\Http\Controllers\tabelController@showadd');
Route::post('/add', 'App\Http\Controllers\tabelController@add');
