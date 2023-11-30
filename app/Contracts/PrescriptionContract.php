<?php

namespace App\Contracts;

interface PrescriptionContract {

    public function storePrescription($params);
    public function getPatientPrescription($id);
}
