<?php

namespace App\Http\Controllers\Web\Stranka;

use App\Http\Controllers\Controller;
use App\Http\Resources\Invoice;
use App\Kosarica;
use App\Racun;
use App\Postavka;
use App\Uporabnik;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function listInvoices(Request $request) {

        $userId = $request->session()->get("userId");

        $user = Uporabnik::find($userId);

        $invoices = $user->ordersForCustomer()->get();

        return view("stranka.zgodovina", ["racuni" => $invoices]);
    }

    public function invoiceDetail(Request $request, $id) {
        $userId = $request->session()->get("userId");

        $invoice = Uporabnik::find($userId)->ordersForCustomer()->where("id_racun", $id)->first();

        return view("stranka.racun", ["racun" => $invoice]);
    }

    public function createInvoice(Request $request) {
        $userId = $request->session()->get("userId");
        $user = Uporabnik::find($userId);

        $invoice = new Racun;
        $user->invoices()->save($invoice);

        $this->addItemsToInvoice($user, $invoice);

        return response()->redirectTo("/racuni/" . $invoice->id_racun);

    }


    private function addItemsToInvoice(Uporabnik $user, Racun $invoice) {
        $items = $user->cartItems();
        $invoiceItems = array();

        foreach ($items as $item) {
            $invoiceItem = new Postavka;
            $invoiceItem->id_produkt = $item->id_produkt;
            $invoiceItem->cena = $item->product->currentPrice()->cena;
            $invoiceItem->kolicina = $item->kolicina;

            $invoiceItems[] = $invoiceItem;
        }

        $invoice->invoiceItems()->saveMany($invoiceItems);

        $items->delete();

        return;
    }
}
