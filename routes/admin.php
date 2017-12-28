<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 28.12.2017
 * Time: 14:46
 */


Route::get('prijava', function() {
    return view('admin.prijava_administrator');
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