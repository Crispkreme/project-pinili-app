<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorySheet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'distributor_id',
        'invoice_number',
        'po_number',
        'delivery_number',
        'delivery_date',
        'previous_delivery',
        'present_delivery',
        'or_number',
        'or_date',
        'description',
    ];

    public function distributor() {
        return $this->belongsTo(Distributor::class, 'distributor_id');
    }
}
