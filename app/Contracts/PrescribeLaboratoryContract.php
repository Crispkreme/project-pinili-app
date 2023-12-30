<?php

namespace App\Contracts;

interface PrescribeLaboratoryContract {

    public function storePrescribeLaboratory($params);
    public function getPrescribeLaboratory($id);
    public function getPrescribeLaboratoryByLaboratoryId($id);
}
