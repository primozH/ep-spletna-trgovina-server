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

Route::get('/', "ProductController@index");


/* USER PATHS */
Route::match(['get', 'post'], '/login', 'UserController@login');

Route::get('/logout', 'UserController@logout');

Route::match(['get', 'post'], '/register', 'UserController@register');

Route::get('/profile', 'UserController@register');

/* PRODUCTS */
Route::get('/{product_category}', 'ProductController@list_products_by_category');

Route::get('/{product_category}/{product_id}', 'ProductController@show_details_for_product');


/* ADMIN */
Route::middleware('auth:admin')->group(function () {

    Route::get('/salesmen', 'SalesmenController@list');
});


