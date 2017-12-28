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
Route::get("/izdelki/{izdelekId}", "ProductController@productDetails");

/* PRIJAVA */
Route::get('/prijava', "LoginController@login")->name("login");
Route::post("prijava", "LoginController@verifyLogin");

/* REGISTRACIJA */
Route::get('/registracija', "LoginController@register")->name("register");
Route::post("registracija", "LoginController@verifyRegister");

/* STRANKA */
Route::get("/stranka/{strankaId}/profil", "UserController@updateUser");
Route::get('/stranka/{strankaId}/zgodovina', "InvoiceController@listInvoices");
Route::get('stranka/{strankaId}/racun/{racunId}', "InvoiceController@invoiceDetail");

Route::get("/kosarica", "CartController@showCart");

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
