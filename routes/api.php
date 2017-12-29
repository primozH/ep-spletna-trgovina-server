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

Route::get('/products', 'ProductController@retrieveProducts');
Route::get('/products/{id_product}', "ProductController@retrieveProduct");

Route::post("/products/{productId}/grade", "GradeController@gradeProduct");

Route::get("/users/{userid}/invoices", "InvoiceController@retrieveInvoices");
Route::get("/users/{userid}/invoices/{invoiceId}", "InvoiceController@retrieveInvoice");
Route::post("/invoices", "InvoiceController@createInvoice");
Route::put("/invoices/{id_invoice}", "InvoiceController@updateInvoice");
Route::delete("/invoices/{id_invoice}", "InvoiceController@deleteInvoice");

Route::post("/invoices/{invoiceId}/items", "InvoiceItemController@addItemsToInvoice");
