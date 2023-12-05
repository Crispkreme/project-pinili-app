<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'petty_cash_id',
        'purchase_item',
        'subtotal',
        'qty',
        'purchase_remarks',
    ];

    public function petty_cash() {
        return $this->belongsTo(PettyCash::class, 'petty_cash_id');
    }
}