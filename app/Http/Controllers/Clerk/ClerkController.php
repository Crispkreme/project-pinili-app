<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\PatientContract;

class ClerkController extends Controller
{
    protected $patientContract;

    public function __construct(
        PatientContract $patientContract
    ){
        $this->patientContract = $patientContract;
    }

    public function index()
    {
        return view('clerk.dashboard');
    }
}
