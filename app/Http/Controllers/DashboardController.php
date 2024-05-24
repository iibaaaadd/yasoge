<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceIn;
use App\Models\InvoiceOut;
use App\Models\Sepatu;

class DashboardController extends Controller
{
    public function index()
    {
        $sepatu = Sepatu::all();
        $invoiceIn = InvoiceIn::all()->count();
        $invoiceOut = InvoiceOut::all()->count();
        return view('dashboard', compact('invoiceIn', 'invoiceOut', 'sepatu'));
    }
}
