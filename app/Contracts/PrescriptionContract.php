<?php

namespace App\Contracts;

interface PrescriptionContract {

    public function storePrescription($params);
    public function getPatientPrescription($id);
    public function getAllPatientPrescription();
    public function getPrescribeMedicineLaboratoryIdByPrescription($params);
    public function getSpecificPatientPrescription($id);
    public function getPrescriptionByPatientCheckupId($id);
}
