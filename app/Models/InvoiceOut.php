<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceOut extends Model
{
    use HasFactory;

    protected $fillable = ['nomor', 'tgl', 'total'];

    public function items()
    {
        return $this->hasMany(InvoiceOutItem::class);
    }
}
