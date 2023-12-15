<?php

namespace App\Contracts;

interface PatientCheckupContract {

    public function allPatientCheckup();
    public function storePatientCheckup($params);
    public function getPatientCheckupById($id);
    public function getPatientCheckupByBmiId($id);
    public function updateFollowUpCheckupDate($id, $params);
    public function getPatientCheckupDataById($id);
    public function updatePatientCheckupStatus($id);
    public function getPatientCheckup();
    public function getNewPatientData();
    public function getFollowupPatientData();
    public function getMonthlyNewPatientData();
    public function getMonthlyFollowupPatientData();
    public function updatePatientCheckup($id, $params);
}
