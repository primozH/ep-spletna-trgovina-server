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
Route::get("/izdelki", "ProductController@search");

/* PRIJAVA */
Route::get('/prijava', "LoginController@login")->name("login");
Route::post("prijava", "LoginController@verifyLogin");
Route::get("/odjava", "LoginController@logout");

/* REGISTRACIJA */
Route::get('/registracija', "LoginController@register")->name("register");
Route::post("registracija", "LoginController@verifyRegister");
Route::get("/registracija/potrdi", "LoginController@confirmVerificationCode");

//Route::get("/mailable", function() {
//    $user = \App\Uporabnik::find(10);
//
//    Mail::to("primoz.hrovat.96@gmail.com")->send(new \App\Mail\RegistrationConfirmation($user, "1234"));
//});

/* STRANKA */
Route::middleware("logged")->group(function() {

    Route::get("/profil", "UserController@getUser");
    Route::post("/profil", "UserController@updateUser");
    Route::get('/racuni', "InvoiceController@listInvoices");
    Route::get('/racuni/{racunId}', "InvoiceController@invoiceDetail");
    Route::post('/racuni', "InvoiceController@createInvoice");

    Route::post("/ocena/{izdelekId}", "ProductController@gradeProduct");

    Route::get("/kosarica", "CartController@showCart");
    Route::post("/kosarica", "CartController@addToCart");
    Route::get("/kosarica/vsebina", "CartController@getCart");
    Route::get("/kosarica/zakljucek", "CartController@showOffer");
    Route::get("/kosarica/{id}", "CartController@removeFromCart");
});


