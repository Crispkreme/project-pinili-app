<?php

namespace App\Contracts;

interface DrugClassContract {

    public function storeDrugClass($params);
    public function getAllDrugClass();
    public function getDrugClassData();
    public function editDrugClass($id);
    public function updateDrugClass($id, $params);
}
