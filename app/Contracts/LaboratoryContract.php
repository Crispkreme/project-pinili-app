<?php

namespace App\Contracts;

interface LaboratoryContract {

    public function getLaboratoryData();
     public function getSpecificLaboratoryByID($id);
}
