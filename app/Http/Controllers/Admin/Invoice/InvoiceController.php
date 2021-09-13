<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateInvoiceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Transection;

class InvoiceController extends Controller
{
    public function invoiceIndex()
    {
        return view('admin.invoice.invoicelist');
    }

    public function addInvoiceView()
    {
        $contacts = Contact::where('contats_type', 'Customer')->get();
        return view('admin.invoice.addinvoice', compact('contacts'));
    }

    public function storeInvoice(CreateInvoiceRequest $request)
    {
        $validated = $request->validated();
        $total = 0;
        foreach ($validated['price'] as $key => $value) {
            $total += $value;
        }

        // $grandtotal = ($total - $validated['discount']) + $validated['vat'];

        $data = [
            'total' => $total,
            'vat' => $validated['vat'],
            'discount' => $validated['discount'],
            'grandtotal' => $validated[ 'grandtotal'],
            'paidamount' => $validated['paidamount'],
            'dueamount' => $validated['dueamount'],
            'created_by' => Auth::user()->id,
            'customer_id' => $validated['customer'],
            'totalitem' => count($validated['item'])
        ];

        try {
            DB::beginTransaction();
            $invoice = Invoice::create($data);
            foreach ($validated['item'] as $key => $value) {
                $data2 = [
                    'invoice_id' => $invoice->id,
                    'itemname'   => $validated['item'][$key],
                    'itemprice'  => $validated['price'][$key],
                    'quantity'  => $validated['qty'][$key],
                ];
            }

            
            DB::commit(); 
        } catch (\Throwable $exception) {
            return redirect(route('admin.addinvoiceview'))->with('invoicewarning', 'Invoice not save, Internal error');
            DB::rollBack();
        }
    }
}
