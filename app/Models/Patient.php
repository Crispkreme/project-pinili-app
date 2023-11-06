<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'gender_id',
        'id_number',
        'firstname',
        'mi',
        'lastname',
        'age',
        'contact_number',
        'address',
    ];

    public function gender() {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
