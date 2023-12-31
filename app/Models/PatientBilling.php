<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientBilling extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'laboratory_id',
        'patient_checkup_id',
        'billing_status_id',
        'invoice_number',
        'age',
        'contact_number',
        'address',
        'srp',
        'quantity',
        'price',
        'qty',
        'sub_total_medicine',
        'sub_total_laboratory',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
    public function laboratory() {
        return $this->belongsTo(Laboratory::class, 'laboratory_id');
    }

    public function patient_checkup() {
        return $this->belongsTo(PatientCheckup::class, 'patient_checkup_id');
    }

    public function billing_status() {
        return $this->belongsTo(Status::class, 'billing_status_id');
    }
}
