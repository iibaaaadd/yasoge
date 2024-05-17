<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    protected $table = 'sepatu';
    
    protected $fillable = ['kode', 'harga', 'gambar'];

    public function invoiceInItems()
    {
        return $this->hasMany(InvoiceInItem::class);
    }
}
