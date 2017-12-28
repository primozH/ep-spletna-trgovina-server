<?php

namespace App\Http\Controllers\Web\Stranka;

use App\Http\Controllers\Controller;
use App\Http\Resources\Invoice;
use App\Racun;
use App\Postavka;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    public function addItemsToInvoice(Request $request, $invoiceId)
    {
        $invoice = Racun::findOrFail($invoiceId);

        $items = array();

        foreach($request["products"] as $item)
        {
            $invoiceItem = new Postavka;
            $invoiceItem->kolicina = $item["quantity"];
            $invoiceItem->id_produkt = $item["productId"];

            $items[] = $invoiceItem;
        }

        $invoice->invoiceItems()->saveMany($items);

        return new Invoice($invoice);
    }
}
