<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrescribeLaboratory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'laboratory_id',
        'quantity',
        'remarks',
        'isActive',
    ];

    public function laboratory() {
        return $this->belongsTo(Laboratory::class, 'laboratory_id');
    }
}
