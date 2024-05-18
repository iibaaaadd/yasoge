<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\InvoiceIn;
use App\Models\InvoiceInItem;
use App\Models\Sepatu;

class InvoiceInController extends Controller
{
    public function index()
    {
        $invoices = InvoiceIn::with('items.sepatu')->get(); // Mendapatkan semua invoice_in beserta relasi sepatu
        return view('invoiceIn.index', compact('invoices'));
    }

    public function create()
    {
        $sepatuItems = Sepatu::all(); // Ambil semua data sepatu dari model Sepatu
        return view('invoiceIn.create', compact('sepatuItems'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan melalui request
        $validatedData = $request->validate([
            'nomor' => 'required',
            'tgl' => 'required|date',
            'total' => 'required',
            'items' => 'required|array|min:1',
            'items.*.sepatu_id' => 'required|exists:sepatu,id',
            'items.*.jumlah' => 'required|integer|min:1',
            'items.*.harga' => 'required|numeric|min:0',
        ]);

        $invoiceIn = InvoiceIn::create([
            'nomor' => $validatedData['nomor'],
            'tgl' => $validatedData['tgl'],
            'total' => $validatedData['total']
        ]);

        foreach ($validatedData['items'] as $item) {
            InvoiceInItem::create([
                'invoice_in_id' => $invoiceIn->id,
                'sepatu_id' => $item['sepatu_id'],
                'jumlah' => $item['jumlah'],
                'harga' => $item['harga'],
            ]);
        }

        // Redirect ke halaman index invoice dengan pesan sukses
        return redirect()->route('invoiceIn.index')->with('success', 'Invoice berhasil disimpan.');
    }

    public function show($id)
    {
        $invoiceIn = InvoiceIn::with('items.sepatu')->findOrFail($id);
        return view('invoiceIn.show', compact('invoiceIn'));
    }
}
