<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/products', 'ProductControllerApi@retrieveProducts');
Route::get('/products/{id_product}', "ProductControllerApi@retrieveProduct");


Route::get("/products/{productId}/grade", "GradeController@retrieveProductGrade");
Route::post("/products/{productId}/grade", "GradeController@addGrade");

Route::get("/invoices", "InvoiceController@retrieveInvoices");
Route::get("/invoices/{id_invoice}", "InvoiceController@retrieveInvoice");
Route::post("/invoices", "InvoiceController@createInvoice");
Route::put("/invoices/{id_invoice}", "InvoiceController@updateInvoice");
Route::delete("/invoices/{id_invoice}", "InvoiceController@deleteInvoice");

Route::post("/invoices/{invoiceId}/items", "InvoiceItemController@addItemsToInvoice");
