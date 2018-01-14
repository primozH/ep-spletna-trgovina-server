<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Postavka;
use App\Racun;
use App\Http\Resources\Invoice as InvoiceResource;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function retrieveInvoices(Request $request, $userid)
    {
        $invoices = Racun::where("id_stranka", $userid)->paginate(20);
        return InvoiceResource::collection($invoices);
    }

    public function retrieveInvoice(Request $request, $userid, $invoiceId)
    {
        $invoice = Racun::where("id_stranka", $userid)->findOrFail($invoiceId);

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

    public function updateInvoice(Request $request, $id)
    {
        $invoice = Racun::findOrFail($id);

        $input = $request->all();
        $invoice->id_prodajalec = $input["salesId"];
        $invoice->storniran_racun = $input["cancelledBy"];
        $invoice->datum = $input["date"];

        return new InvoiceResource($invoice);
    }

    public function deleteInvoice(Request $request, $id)
    {
        Racun::destroy($id);

        return response("", 204);
    }
}
