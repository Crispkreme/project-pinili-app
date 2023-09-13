<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'patient_checkup_id',
        'findings',
        'recomendation',
        'request_date',
        'isRelease',
    ];
}
