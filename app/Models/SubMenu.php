<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'list',
        'url',
        'icon',
        'class',
        'isActive',
    ];
}
