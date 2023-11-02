<?php

namespace App\Contracts;

interface PatientCheckupImageContract {

    public function allPatientCheckupImage();
    public function storePatientCheckupImage($params);
}
