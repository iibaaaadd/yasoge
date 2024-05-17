<?php

// app/Models/InvoiceIn.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceIn extends Model
{
    protected $table = 'invoice_ins'; // Specify the correct table name

    protected $fillable = ['nomor', 'tgl','total'];

    public function items()
    {
        return $this->hasMany(InvoiceInItem::class);
    }
}


