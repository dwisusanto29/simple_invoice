<?php

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

Route::get('/', 'TransactionController@index');

Route::get('/invoice/list', 'TransactionController@list');

Route::get('/invoice/add', 'TransactionController@create');

Route::post('/invoice/add', 'TransactionController@store');

Route::get('/invoice/gen/{id}', 'TransactionController@genInvoice');