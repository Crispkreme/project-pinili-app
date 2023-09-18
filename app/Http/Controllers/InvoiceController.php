<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function getAllInvoice()
    {
        
    }

    public function getDailyOrderInvoice()
    {
        return view('pdf.daily-order-invoice-report');
    }
}
