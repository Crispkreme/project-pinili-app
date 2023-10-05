<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'sub_menu_id',
        'list',
        'url',
        'icon',
        'class',
        'isActive',
        'isMenuTitle',
    ];

    public function sub_menu() {
        return $this->belongsTo(SubMenu::class, 'sub_menu_id');
    }
}
