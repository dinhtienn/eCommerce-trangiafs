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

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index',
]);

Route::get('/lien-he', [
    'as' => 'contact',
    'uses' => 'CompanyController@contact'
]);

Route::get('/thong-tin', [
    'as' => 'info',
    'uses' => 'CompanyController@info'
]);

Route::get('/san-pham', [
    'as' => 'product',
    'uses' => 'ProductController@index'
]);

Route::get('/gio-hang', [
    'as' => 'card.checkout',
    'uses' => 'ProductController@checkout'
]);

//API
Route::get('/xem-nhanh-san-pham', [
    'as' => 'ajax.product.view',
    'uses' => 'ProductController@quickView'
]);
