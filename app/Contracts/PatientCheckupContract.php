<?php

namespace App\Contracts;

interface PatientCheckupContract {

    public function allPatientCheckup();
    public function storePatientCheckup($params);
}
