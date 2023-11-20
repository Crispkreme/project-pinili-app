<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'patient_checkup_id',
        'laboratory_id',
        'status_id',
        'invoice_number',
        'remarks',
        'qty',
        'isActive',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function patientCheckup() {
        return $this->belongsTo(PatientCheckup::class, 'patient_checkup_id');
    }

    public function laboratory() {
        return $this->belongsTo(Laboratory::class, 'laboratory_id');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
