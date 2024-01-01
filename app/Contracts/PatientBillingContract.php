<?php

namespace App\Contracts;

interface PatientBillingContract {

    public function storePatientBilling($params);
    public function getPatientBillingByCheckupId($id);
}
