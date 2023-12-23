<?php

namespace App\Http\Controllers;

use App\Contracts\CompanyContract;
use App\Http\Requests\AddCompanyStoreRequest;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    protected $companyContract;

    public function __construct(CompanyContract $companyContract) {
        $this->companyContract = $companyContract;
    }

    public function index()
    {
        $userData = $this->companyContract->getAllCompany();

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.companies.index', ['userData' => $userData]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.companies.index', ['userData' => $userData]);
            } else {
                return view('404');
            }
        }
    }

    public function createCompany()
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.companies.create');
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.companies.create');
            } else {
                return view('404');
            }
        }
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

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.company')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.company')->with($notification);
                } else {
                    return view('404');
                }
            }

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.company')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.company')->with($notification);
                } else {
                    return view('404');
                }
            }
        }
    }

    public function editCompany($id)
    {
        $company = $this->companyContract->editCompany($id);

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.companies.edit', [
                    'company' => $company,
                ]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.companies.edit', [
                    'company' => $company,
                ]);
            } else {
                return view('404');
            }
        }
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

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.company')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.company')->with($notification);
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

    public function getCompanyProfile()
    {
        dd('profile');
    }
}
