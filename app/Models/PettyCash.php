<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PettyCash extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "user_id",
        "petty_cash_status_id",
        "invoice_number",
        "amount",
        "file_date",
        "remarks",
        "paid_amount",
        "discount",
        "total_amount",
        "change",
        "isApprove",
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function petty_cash_status() {
        return $this->belongsTo(Status::class, 'petty_cash_status_id');
    }
}