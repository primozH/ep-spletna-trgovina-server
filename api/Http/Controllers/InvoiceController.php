<?php

namespace Api\Http\Controllers;

use Api\Postavka;
use Api\Racun;
use Api\Http\Resources\Invoice as InvoiceResource;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function retrieveInvoices()
    {
        $invoices = Racun::paginate(20);
        return InvoiceResource::collection($invoices);
    }

    public function retrieveInvoice(Request $request, $id)
    {
        $invoice = Racun::find($id);

        return new InvoiceResource($invoice);
    }

    public function createInvoice(Request $request)
    {
        $invoice = new Racun;

        $input = $request->all();

        $items = array();

        foreach($input["products"] as $item)
        {
            $invoiceItem = new Postavka;

            $invoiceItem->id_produkt = $item["id"];
            $invoiceItem->kolicina = $item["quantity"];

            $items[] = $invoiceItem;
        }

        $invoice->id_stranka = $input["customer_id"];

        $invoice->save();

        $invoice->invoiceItems()->saveMany($items);

        return new InvoiceResource($invoice);
    }
}
