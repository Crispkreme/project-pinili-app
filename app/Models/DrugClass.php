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
        'id_number',
        'name',
        'description',
        'classification',
    ];
}