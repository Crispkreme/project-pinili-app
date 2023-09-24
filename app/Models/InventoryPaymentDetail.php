<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryPaymentDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'inventory_sheet_id',
        'current_paid_amount',
        'balance',
    ];

    public function inventory_sheet() {
        return $this->belongsTo(InventorySheet::class, 'inventory_sheet_id');
    }
}
