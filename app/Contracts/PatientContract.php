<?php

namespace App\Contracts;

interface PatientContract {

    public function allPatient();
    public function storePatient($params);
    public function getPatientById($id);
}
