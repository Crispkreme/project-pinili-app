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
        'patient_checkup_id',
        'prescribe_laboratory_id',
        'prescribe_medicine_id',
        'status_id',
        'invoice_number',
        'remarks',
        'qty',
        'isActive',
    ];

    public function prescribe_medicine() {
        return $this->belongsTo(PrescribeMedicine::class, 'prescribe_medicine_id');
    }

    public function patientCheckup() {
        return $this->belongsTo(PatientCheckup::class, 'patient_checkup_id');
    }

    public function prescribe_laboratory() {
        return $this->belongsTo(PrescribeLaboratory::class, 'prescribe_laboratory_id');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
