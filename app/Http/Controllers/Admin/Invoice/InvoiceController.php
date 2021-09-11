<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoiceIndex()
    {
        return view('admin.invoice.invoicelist');
    }

    public function addInvoiceView()
    {
        return view('admin.invoice.addinvoice');
    }
}
