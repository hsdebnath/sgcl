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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'PagesController@index');

Route::get('/dash', 'PagesController@dash');

Route::get('/users', 'PagesController@users');

Route::resource('items', 'ItemsController');

Route::resource('purchase', 'PurchaseController');

Route::resource('inventory', 'InventoryController');

Route::resource('orders', 'OrdersController');

Route::resource('sales', 'SalesController');

Route::resource('company', 'CompaniesController');

Route::resource('account', 'AccountsController');

Route::resource('expanse', 'ExpansesController');

Route::resource('fund', 'FundsController');

Route::resource('bank', 'BanksController');

Route::resource('report', 'reportsController');