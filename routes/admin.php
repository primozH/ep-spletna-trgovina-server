<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 28.12.2017
 * Time: 14:46
 */

Route::middleware(["adminLogged", "logger"])->group(function() {
    Route::get("/", "SalesController@listSalesmen");
    Route::get("/prodajalci/{id}", "SalesController@getSalesman");
    Route::get("/prodajalci", "SalesController@addSalesman");
    Route::post("/prodajalci/{id}", "SalesController@updateSalesman");
    Route::post("/prodajalci", "SalesController@createSalesman");

    Route::get("/profil", "ProfileController@details");
    Route::post("/profil", "ProfileController@updateProfile");
});

Route::get("/prijava", "LoginController@login");
Route::post("/prijava", "LoginController@verifyLogin");
Route::get("/odjava", "LoginController@logout");