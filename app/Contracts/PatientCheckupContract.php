<?php

namespace App\Contracts;

interface PatientCheckupContract {

    public function allPatientCheckup();
    public function storePatientCheckup($params);
    public function getPatientCheckupById($id);
    public function getPatientCheckupByBmiId($id);
    public function updateFollowUpCheckupDate($id, $params);
    public function getPatientCheckupDataById($id);
}
