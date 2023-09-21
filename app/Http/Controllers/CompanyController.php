<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Contracts\CompanyContract;
use App\Http\Requests\AddCompanyStoreRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    protected $companyContract;

    public function __construct(CompanyContract $companyContract) {
        $this->companyContract = $companyContract;
    }

    public function index()
    {
        $userData = $this->companyContract->getAllCompany();
        return view('admin.companies.index', ['userData' => $userData]);
    }

    public function createCompany()
    {
        return view('admin.companies.create');
    }

    public function storeCompany(AddCompanyStoreRequest $request)
    {
        try {
            $prefix = "CMPY";
            $transactionNumber = Carbon::now()->format('mHis');
            $id_number = $prefix.'-'.$transactionNumber;

            $params = $request->validated();
            $params['id_number'] = $id_number;

            $this->companyContract->storeCompany($params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.all.company')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->route('admin.all.company')->with($notification);
        }
    }

    public function editCompany($id)
    {
        $company = $this->companyContract->editCompany($id);

        return view('admin.companies.edit', [
            'company' => $company,
        ]);
    }

    public function updateCompany(AddCompanyStoreRequest $request, $id)
    {
        try {

            $params = $request->validated();

            $this->companyContract->updateCompany($id, $params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.all.company')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function getCompanyProfile()
    {
        dd('profile');
    }
}
