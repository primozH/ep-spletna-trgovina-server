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
Route::prefix("views")->group(function() {
    Route::get("/products/{id_product}", "ProductController@showDetailsForProduct");
});


/* ADMIN */
Route::middleware('auth:admin')->group(function () {

    Route::get('/salesmen', 'SalesmanController@list');
    Route::get("/salesmen/{idSalesman}", "SalesmanController@editDetails");
});

Route::prefix("sales")->group(function() {
    Route::get("/products", "ProductController@retrieveProducts");
    Route::get("/products/{id_product}", "ProductController@retrieveProduct");
    Route::post('/products', "ProductController@createProduct");
    Route::put("/products/{id_product}", "ProductController@updateProduct");
    Route::delete('/products/{id_product}', "ProductController@deleteProduct");
});


