<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceIn;
use App\Models\InvoiceOut;

class DashboardController extends Controller
{
    public function index()
    {
        $invoiceIn = InvoiceIn::all()->count();
        $invoiceOut = InvoiceOut::all()->count();
        return view('dashboard', compact('invoiceIn', 'invoiceOut'));
    }
}
