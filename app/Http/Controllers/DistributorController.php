<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Contracts\CompanyContract;
use App\Contracts\DistributorContract;
use App\Contracts\RepresentativeContract;
use App\Http\Requests\AddDistributorStoreRequest;

class DistributorController extends Controller
{
    protected $distributorContract;
    protected $representativeContract;
    protected $companyContract;

    public function __construct(
        DistributorContract $distributorContract,
        RepresentativeContract $representativeContract,
        CompanyContract $companyContract
    ) {
        $this->distributorContract = $distributorContract;
        $this->representativeContract = $representativeContract;
        $this->companyContract = $companyContract;
    }

    public function index()
    {
        $userData = $this->distributorContract->getAllDistributor();
        return view('admin.distributors.index', ['userData' => $userData]);
    }

    public function createDistributor()
    {
        $representatives = $this->representativeContract->getRepresentativeData();
        $companies = $this->companyContract->getCompanyData();

        return view('admin.distributors.create', [
            'representatives' => $representatives,
            'companies' => $companies,
        ]);
    }

    public function storeDistributor(AddDistributorStoreRequest $request)
    {
        try {
            $prefix = "DST";
            $transactionNumber = Carbon::now()->format('mHis');
            $id_number = $prefix.'-'.$transactionNumber;

            $params = $request->validated();
            $params['id_number'] = $id_number;
            $params['isActive'] = 1;

            $this->distributorContract->storeDistributor($params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.all.distributor')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->route('admin.all.distributor')->with($notification);
        }
    }

    public function editDistributor($id)
    {
        $distributor = $this->distributorContract->editDistributor($id);

        return view('admin.distributors.edit', [
            'distributor' => $distributor,
        ]);
    }

    public function updateDistributor(AddDistributorStoreRequest $request, $id)
    {
        try {

            $params = $request->validated();

            $this->distributorContract->updateDistributor($id, $params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.all.distributor')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }
}
