<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'supplier_id',
        'manufacturer_id',
        'product_id',
        'status_id',
        'invoice_number',
        'quantity',
        'purchase_cost',
        'srp',
        'remarks',
        'expiry_date',
        'manufacturing_date',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supplier() {
        return $this->belongsTo(Entity::class, 'supplier_id');
    }

    public function manufacturer() {
        return $this->belongsTo(Distributor::class, 'manufacturer_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
