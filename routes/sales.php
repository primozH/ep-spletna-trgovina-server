<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 28.12.2017
 * Time: 14:45
 */


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