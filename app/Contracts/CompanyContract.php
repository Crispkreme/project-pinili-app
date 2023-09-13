<?php

namespace App\Contracts;

interface CompanyContract {

    public function storeCompany($params);
    public function getAllCompany();
    public function getCompanyData();
    public function editCompany($id);
    public function updateCompany($id, $params);
}
