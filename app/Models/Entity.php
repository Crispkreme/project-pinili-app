<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'role_id',
        'id_number',
        'name',
        'contact_number',
        'address',
        'role',
        'isActive',
    ];

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
