<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'form_id',
        'barcode',
        'serial_number',
        'medicine_name',
        'generic_name',
        'description',
    ];

    public function category() {
        return $this->belongsTo(DrugClass::class, 'category_id');
    }

    public function form() {
        return $this->belongsTo(DrugClass::class, 'form_id');
    }
}
