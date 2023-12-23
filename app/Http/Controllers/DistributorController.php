<?php

namespace App\Http\Controllers;

use App\Contracts\CompanyContract;
use App\Contracts\DistributorContract;
use App\Contracts\RepresentativeContract;
use App\Http\Requests\AddDistributorStoreRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.distributors.index', ['userData' => $userData]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.distributors.index', ['userData' => $userData]);
            } else {
                return view('404');
            }
        }
    }

    public function createDistributor()
    {
        $representatives = $this->representativeContract->getRepresentativeData();
        $companies = $this->companyContract->getCompanyData();

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.distributors.create', [
                    'representatives' => $representatives,
                    'companies' => $companies,
                ]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.distributors.create', [
                    'representatives' => $representatives,
                    'companies' => $companies,
                ]);
            } else {
                return view('404');
            }
        }
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

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.distributor')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.distributor')->with($notification);
                } else {
                    return view('404');
                }
            }

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function editDistributor($id)
    {
        $distributor = $this->distributorContract->editDistributor($id);

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.distributors.edit', [
                    'distributor' => $distributor,
                ]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.distributors.edit', [
                    'distributor' => $distributor,
                ]);
            } else {
                return view('404');
            }
        }
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

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.distributor')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.distributor')->with($notification);
                } else {
                    return view('404');
                }
            }

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }
}
