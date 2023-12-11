<?php

namespace App\Contracts;

interface PatientBmiContract {

    public function allPatientBmi();
    public function storePatientBmi($params);
    public function getPatientBmiByPatientId($id);
    public function updatePatientBmi($id, $params);
    public function getPatientBMIByCheckupId($id);
    public function addPatientDiagnosis($id, $params);
    public function getPatientIdByPatientBmi($id);
}
