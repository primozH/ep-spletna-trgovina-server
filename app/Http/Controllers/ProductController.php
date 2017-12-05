<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index() {
        return view('index');
    }

    public function list_products_by_category($product_category) {
        return view('welcome');
    }

    public function show_details_for_product($product_category, $product_id) {
        $product_name = "Prenosni računalnik ASUS ROG";
        return view('product_details', ["product_name" => $product_name]);
    }
}
