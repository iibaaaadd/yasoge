<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\InvoiceOut;
use App\Models\InvoiceOutItem;
use App\Models\Sepatu;

class InvoiceOutController extends Controller
{
    public function index()
    {
        $invoiceOut = InvoiceOut::with('items.sepatu')->get(); // Mendapatkan semua invoice_in beserta relasi sepatu
        return view('invoiceOut.index', compact('invoiceOut'));
    }

    public function create()
    {
        $sepatuItems = Sepatu::all(); // Ambil semua data sepatu dari model Sepatu
        return view('invoiceOut.create', compact('sepatuItems'));
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

        // Periksa apakah nomor invoice sudah ada
        if (InvoiceOut::where('nomor', $validatedData['nomor'])->exists()) {
            // Kembalikan dengan pesan error jika nomor sudah ada
            return redirect()->back()->withErrors(['nomor' => 'Nomor invoice sudah ada.'])->withInput();
        }

        // Buat invoice baru
        $invoiceOut = InvoiceOut::create([
            'nomor' => $validatedData['nomor'],
            'tgl' => $validatedData['tgl'],
            'total' => $validatedData['total']
        ]);

        foreach ($validatedData['items'] as $item) {
            InvoiceOutItem::create([
                'invoice_out_id' => $invoiceOut->id,
                'sepatu_id' => $item['sepatu_id'],
                'jumlah' => $item['jumlah'],
                'harga' => $item['harga'],
            ]);
        }

        // Redirect ke halaman index invoice dengan pesan sukses
        return redirect()->route('invoiceOut.index')->with('success', 'Invoice berhasil disimpan.');
    }


    public function show($id)
    {
        $invoiceOut = InvoiceOut::with('items.sepatu')->findOrFail($id);
        return view('invoiceOut.show', compact('invoiceOut'));
    }
}
