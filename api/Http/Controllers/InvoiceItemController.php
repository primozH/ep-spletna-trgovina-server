<?php

namespace Api\Http\Controllers;

use App\Postavka;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    public function createInvoiceItem() {
        $item = new Postavka;
    }
}
