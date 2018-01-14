<?php
/**
 * Created by PhpStorm.
 * User: primoz
 * Date: 6.1.2018
 * Time: 8:56
 */

namespace App\Http\Controllers\Web\Prodajalec;


use App\Http\Controllers\Controller;
use App\Postavka;
use Illuminate\Http\Request;
use App\Racun;

class InvoiceController extends Controller
{

    public function index(Request $request) {
        $openInvoices = Racun::where("status", "odprt")->orderBy("datum", "desc")->get();
        $otherInvoices = Racun::where("status", "<>", "odprt")->orderBy("datum", "desc")->get();

        return view("prodajalec.index_prodajalec",
            ["odprtiRacuni" => $openInvoices,
                "zgodovinaRacuni" => $otherInvoices]);
    }

    public function showInvoiceForEdit(Request $request, $id)
    {
        $invoice = Racun::find($id);

        return view("prodajalec.obdelava_prodajalec", ["racun" => $invoice]);
    }

    public function saveInvoice(Request $request, $id)
    {
        $invoice = Racun::find($id);

        $invoice->status = htmlspecialchars($request->input("status"));
        if (!$invoice->datum)
            $invoice->datum = date("Y-m-d");


        $invoice->id_prodajalec = htmlspecialchars($request->input("id_prodajalec"));

        $invoice->save();

        return redirect("/prodaja");
    }

    public function cancellation(Request $request, $id)
    {
        $invoice = Racun::find($id);

        $invoice_new = new Racun;

        $invoice_new->datum = date("Y-m-d");
        $invoice_new->status = "zaključen";
        $invoice_new->znesek = -$invoice->znesek;
        $invoice_new->storniran_racun = $invoice->id_racun;
        $invoice_new->id_stranka = $invoice->id_stranka;
        $invoice_new->id_prodajalec = $invoice->id_prodajalec;

        $invoice->status = "storniran";

        $invoice->save();
        $invoice_new->save();

        foreach ($invoice->invoiceItems()->get() as $item) {
            $invoice_item = new Postavka;
            $invoice_item->kolicina = $item->kolicina;
            $invoice_item->id_produkt = $item->id_produkt;
            $invoice_new->invoiceItems()->save($invoice_item);
        }

        return redirect("/prodaja/");

    }
}