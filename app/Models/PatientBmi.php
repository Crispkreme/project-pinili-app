<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientBmi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'patient_id',
        'blood_pressure',
        'heart_rate',
        'temperature',
        'weight',
        'symptoms',
        'diagnosis',
    ];

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
