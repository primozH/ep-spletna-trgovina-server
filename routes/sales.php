<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 28.12.2017
 * Time: 14:45
 */

Route::get("/", "InvoiceController@index");
Route::get("/racuni/{id}", "InvoiceController@showInvoiceForEdit");
Route::post("/racuni/{id}", "InvoiceController@saveInvoice");
Route::post("/racuni/{id}/storniraj", "InvoiceController@cancellation");

Route::get("/izdelki", "ProductController@listProducts");
Route::get("/izdelki/{id}", "ProductController@showProduct");
Route::get("/izdelki/dodaj", "ProductController@addProduct");
Route::post("/izdelki/dodaj", "ProductController@createProduct");
Route::post("/izdelki/{id}", "ProductController@updateProduct");
Route::post("/izdelki/{id}/slike", "ProductController@uploadImage");


Route::get("/stranke", "CustomerController@showCustomers");
Route::get("/stranke/{id}", "CustomerController@showCustomer");
Route::get("/stranke/dodaj", "CustomerController@addCustomer");
Route::post("/stranke/dodaj", "CustomerController@createCustomer");
Route::post("/stranke/{id}", "CustomerController@updateCustomer");


Route::get("/profil", "ProfileController@details");
Route::post("/profil", "ProfileController@updateProfile");


Route::get("/prijava", "LoginController@login");
Route::post("/prijava", "LoginController@verifyLogin");