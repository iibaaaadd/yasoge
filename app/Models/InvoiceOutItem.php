<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceOutItem extends Model
{
    protected $table = 'invoice_out_items';

    protected $fillable = ['invoice_out_id', 'sepatu_id', 'jumlah', 'harga'];

    public function invoiceOut()
    {
        return $this->belongsTo(InvoiceOut::class);
    }

    public function sepatu()
    {
        return $this->belongsTo(Sepatu::class, 'sepatu_id');
    }
}
