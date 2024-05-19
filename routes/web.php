<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceInController;
use App\Http\Controllers\InvoiceOutController;

Route::get('/invoicein', [InvoiceInController::class, 'index'])->name('invoiceIn.index');
Route::get('/invoicein/create', [InvoiceInController::class, 'create'])->name('invoiceIn.create');
Route::post('/invoicein', [InvoiceInController::class, 'store'])->name('invoiceIn.store');

Route::get('/invoiceout', [InvoiceOutController::class, 'index'])->name('invoiceOut.index');
Route::get('/invoiceout/create', [InvoiceOutController::class, 'create'])->name('invoiceOut.create');
Route::post('/invoiceout', [InvoiceOutController::class, 'store'])->name('invoiceOut.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/sepatu', [SepatuController::class, 'index'])->name('sepatu.index');
Route::post('/sepatu', [SepatuController::class, 'store'])->name('sepatu.store');
Route::put('/sepatu/{id}', [SepatuController::class, 'update'])->name('sepatu.update');
Route::delete('/sepatu/{id}', [SepatuController::class, 'destroy'])->name('sepatu.destroy');
Route::get('/sepatu/download/{id}', [SepatuController::class, 'download'])->name('sepatu.download');

Route::get('/', function () {
    return view('dashboard');
});
