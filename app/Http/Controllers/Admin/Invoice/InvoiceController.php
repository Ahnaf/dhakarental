<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Transection;
use PDF;

class InvoiceController extends Controller
{
    public function invoiceIndex()
    {
        $invoices = Invoice::orderBy('id', 'DESC')->paginate(10);
        return view('admin.invoice.invoicelist', compact('invoices'));
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
            $total += $value * $validated['qty'][$key];
        }
        $grandtotal = ($total - $validated['discount']) + $validated['vat'];

        $data = [
            'total' => $total,
            'vat' => $validated['vat'],
            'discount' => $validated['discount'],
            'grandtotal' => $grandtotal,
            'paidamount' => $validated['paidamount'],
            'dueamount' => $validated['dueamount'],
            'created_by' => Auth::user()->id,
            'customer_id' => $validated['customer'],
            'totalitem' => count($validated['item']),
            'status'    => 'pandding'
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
                    'created_by' => Auth::user()->id,
                    'customer_id' => $validated['customer']
                ];
                Item::create($data2);
            }
            DB::commit();
            return redirect(route('admin.invoicelist'))->with('invoicesuccess', 'Invoice successfully saved!'); 
        } catch (\Throwable $exception) {
            return redirect(route('admin.addinvoiceview'))->with('invoicewarning', 'Invoice not save, Internal error');
            DB::rollBack();
        }
    }

    public function deleteInvoice(Request $request)
    {
        $id = $request->invoiceid;
        $find = Invoice::findorFail($id);

        $find->delete();
        return response()->json(['success' => 'Invoice successfully deleted!' . $id, 200]);
    }

    public function editInvoiceView($id)
    {
        $contacts = Contact::where('contats_type', 'Customer')->get();
        $invoice = Invoice::findOrFail($id);
        return view('admin.invoice.editinvoice', compact('contacts', 'invoice'));
    }

    public function updateInvoice(UpdateInvoiceRequest $request)
    {

        $validated = $request->validated();
        $total = 0;
        foreach ($validated['price'] as $key => $value) {
            $total += $value * $validated['qty'][$key];
        }
        $grandtotal = ($total - $validated['discount']) + $validated['vat'];
        $data = [
            'total' => $total,
            'vat' => $validated['vat'],
            'discount' => $validated['discount'],
            'grandtotal' => $grandtotal,
            'paidamount' => $validated['paidamount'],
            'dueamount' => $validated['dueamount'],
            'created_by' => Auth::user()->id,
            'customer_id' => $validated['customer'],
            'totalitem' => count($validated['item']),
            'status'    => 'pandding'
        ];

        try {
            DB::beginTransaction();
            Invoice::where('id', $validated['invoiceid'])->update($data);
            foreach ($validated['item'] as $key => $value) {
                $data2 = [
                    'invoice_id' => $validated['invoiceid'],
                    'itemname'   => $validated['item'][$key],
                    'itemprice'  => $validated['price'][$key],
                    'quantity'  => $validated['qty'][$key],
                    'created_by' => Auth::user()->id,
                    'customer_id' => $validated['customer']
                ];
 
                if(!empty($validated['itemid'][$key])){
                    Item::where('id', $validated['itemid'][$key])->update($data2);
                }else{

                    Item::create($data2);
                }
            }

            DB::commit();
            return redirect(route('admin.invoicelist'))->with('invoicesuccess', 'Invoice successfully updated!');
        } catch (\Throwable $exception) {
            return redirect(route('admin.editinvoice', ['id' => $validated['invoiceid']]))->with('invoicewarning', 'Invoice not save, Internal error');
            DB::rollBack();
        }

        
    }

    public function deleteInvoiceItem(Request $request)
    {
        $id = $request->id;
        $findItem = Item::findOrFail($id);
        $invoice = Invoice::findOrFail($findItem->invoice_id);

        $invoiceTotal = $invoice->total - $findItem->itemprice;
        $invoiceGrandTotal = $invoice->grandtotal - $findItem->itemprice;
        $invoiceTotalItem = $invoice->totalitem - 1;
        $data = [
            'total' => $invoiceTotal,
            'grandtotal' => $invoiceGrandTotal,
            'totalitem' => $invoiceTotalItem,
            'status'    => 'pandding'
        ];
        Invoice::where('id', $findItem->invoice_id)->update($data);
        $findItem->delete();
        return response()->json(['success' => "Item successfully remove!"]);
    }

    public function invoiceDetail($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('admin.invoice.invoicedetails', compact('invoice'));
    }

    // public function makePdf($id)
    // {
    //     $pdf = PDF::loadView('invoice.pdf');
    //     //return $pdf->download('invoice.pdf');
    // }
}
