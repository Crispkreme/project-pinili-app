<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugClass extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'classification_id',
        'id_number',
        'name',
        'description',
    ];

    public function classification() {
        return $this->belongsTo(Classification::class, 'classification_id');
    }
}
