<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryPayment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'inventory_sheet_id',
        'customer_id',
        'payment_status_id',
        'due_amount',
        'balance',
        'paid_amount',
        'total_amount',
        'discount_amount',
    ];

    public function inventory_sheet() {
        return $this->belongsTo(InventorySheet::class, 'inventory_sheet_id');
    }

    public function customer() {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function payment_status() {
        return $this->belongsTo(Status::class, 'payment_status_id');
    }
}
