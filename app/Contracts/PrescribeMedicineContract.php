<?php

namespace App\Contracts;

interface PrescribeMedicineContract {

    public function storePrescribeMedicine($params);
    public function getPrescribeMedicine($id);
    public function checkMedicineById($id);
}
