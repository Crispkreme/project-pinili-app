<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'supplier_id',
        'user_id',
        'id_number',
        'price',
        'purchase_stocks',
        'srp',
        'po_number',
        'isActive',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function supplier() {
        return $this->belongsTo(Entity::class, 'supplier_id');
    }
}
