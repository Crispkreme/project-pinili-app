<?php

namespace App\Contracts;

interface PatientBmiContract {

    public function allPatientBmi();
    public function storePatientBmi($params);
}
