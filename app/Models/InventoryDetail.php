<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'inventory_sheet_id',
        'product_id',
        'inventory_status_id',
        'qty',
        'price',
        'subtotal',
    ];

    public function inventory_sheet() {
        return $this->belongsTo(InventorySheet::class, 'inventory_sheet_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function inventory_status() {
        return $this->belongsTo(Status::class, 'inventory_status_id');
    }
}
