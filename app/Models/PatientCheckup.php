<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCheckup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id_number',
        'patient_bmi_id',
        'status_id',
        'remarks',
        'isNew',
        'isFollowUp',
        'follow_up_date',
        'check_up_date',
    ];

    public function patientBmi() {
        return $this->belongsTo(PatientBmi::class, 'patient_bmi_id');
    }

    public function statuses() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}