<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrescribeMedicine extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'srp',
        'quantity',
        'remarks',
        'isActive',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
