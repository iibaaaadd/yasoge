<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceInItem extends Model
{
    protected $table = 'invoice_in_items';

    protected $fillable = ['invoice_in_id', 'sepatu_id', 'jumlah', 'harga', 'total'];

    public function invoiceIn()
    {
        return $this->belongsTo(InvoiceIn::class);
    }

    public function sepatu()
    {
        return $this->belongsTo(Sepatu::class, 'sepatu_id');
    }
}
