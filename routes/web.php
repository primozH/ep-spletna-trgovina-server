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
//Route::get('/{product_category}', 'ProductController@list_products_by_category');

//Route::get('/{product_category}/{product_id}', 'ProductController@show_details_for_product');
Route::get('/izdelki', function() {
    return view('index');
});

Route::get('/prijava', function() {
    return view('prijava_stranka');
});

Route::get('/registracija', function() {
    return view('registracija_stranka');
});

Route::get('/izdelki-stranka', function() {
    return view('index_stranka');
});

Route::get('/posodobi', function() {
    return view('posodobi_stranka');
});

Route::get('/zgodovina', function() {
    return view('zgodovina_nakupov_stranka');
});

Route::get('/prijava-administrator', function() {
    return view('prijava_administrator');
});

Route::get('/izdelki-administrator', function() {
    return view('index_administrator');
});

Route::get('/posodobi-administrator', function() {
   return view('posodobi_administrator');
});

Route::get('/upravljanje-administrator', function() {
    return view('upravljanje_administrator');
});

Route::get('/ustvari-administrator', function() {
    return view('ustvari_prodajalca_administrator');
});

Route::get('/prodajalci-administrator', function() {
    return view('prodajalci_administrator');
});

Route::get('/prijava-prodajalec', function() {
    return view('prijava_prodajalec');
});

Route::get('/izdelki-prodajalec', function() {
    return view('index_prodajalec');
});

Route::get('/posodobi-prodajalec', function() {
    return view('posodobi_prodajalec');
});

Route::get('/obdelava-prodajalec', function() {
    return view('obdelava_prodajalec');
});

Route::get('/neobdelana-prodajalec', function() {
    return view('neobdelana_narocila_prodajalec');
});

Route::get('/potrjena-prodajalec', function() {
    return view('potrjena_narocila_prodajalec');
});

Route::get('/dodaj-prodajalec', function() {
    return view('dodaj_artikel_prodajalec');
});

Route::get('/artikli-prodajalec', function() {
   return view('artikli_prodajalec');
});

Route::get('/posodobi-artikel-prodajalec', function() {
    return view('posodobi_artikel_prodajalec');
});

Route::get('/ustvari-prodajalec', function() {
   return view('ustvari_stranko_prodajalec');
});

Route::get('/stranke-prodajalec', function() {
    return view('pregled_strank_prodajalec');
});

Route::get('/posodobi-stranko-prodajalec', function() {
    return view('posodobi_stranko_prodajalec');
});
/* ADMIN */
Route::middleware('auth:admin')->group(function () {

    Route::get('/salesmen', 'SalesmenController@list');
});


