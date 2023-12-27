<?php

namespace App\Contracts;

interface LaboratoryContract {

    public function getLaboratoryData();
    public function getSpecificLaboratoryByID($id);
    public function getSpecificLaboratory($id);
    public function getLaboratory();
}
