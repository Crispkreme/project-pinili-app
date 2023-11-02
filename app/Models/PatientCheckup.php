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
        'patient_id',
        'patient_bmi_id',
        'status', 
        'remarks',
        'isNew',
        'isFollowUp',
    ];
}
