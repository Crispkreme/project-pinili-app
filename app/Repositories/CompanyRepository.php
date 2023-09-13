<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use App\Contracts\CompanyContract;

class CompanyRepository implements CompanyContract {

    protected $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }

    public function storeCompany($params)
    {
        return $this->model->create($params);
    }

    public function getAllCompany()
    {
        return $this->model->get();
    }

    public function getCompanyData()
    {
        return Company::pluck('company_name', 'id')->toArray();
    }

    public function editCompany($id)
    {
        return $this->model->find($id);
    }

    public function updateCompany($id, $params)
    {
        $company = Company::findOrFail($id);
        $company->update($params);
        return $company;
    }
}
