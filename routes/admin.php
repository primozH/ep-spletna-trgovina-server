<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 28.12.2017
 * Time: 14:46
 */


Route::get('/prijava', function() {
    return view('admin.prijava_administrator');
});

Route::get('/profil', function() {
    return view('admin.index_administrator');
});

Route::get('/posodobi', function() {
    return view('admin.posodobi_administrator');
});

Route::get('/upravljanje', function() {
    return view('admin.upravljanje_administrator');
});

Route::get('/ustvari', function() {
    return view('admin.ustvari_prodajalca_administrator');
});

Route::get('/', function() {
    return view('admin.prodajalci_administrator');
});