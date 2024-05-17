<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceInController;

Route::get('/invoicein', [InvoiceInController::class, 'index'])->name('invoiceIn.index');
Route::get('/invoicein/{id}', [InvoiceInController::class, 'show'])->name('invoiceIn.show');
Route::get('/invoices/create', [InvoiceInController::class, 'create'])->name('invoiceIn.create');
Route::post('/invoices', [InvoiceInController::class, 'store'])->name('invoiceIn.store');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/sepatu', [SepatuController::class, 'index'])->name('sepatu.index');
Route::get('/sepatu/create', [SepatuController::class, 'create'])->name('sepatu.create');
Route::post('/sepatu', [SepatuController::class, 'store'])->name('sepatu.store');

Route::get('/', function () {
    return view('dashboard');
});
