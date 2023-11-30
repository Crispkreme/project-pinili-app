<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Contracts\DrugClassContract;
use Illuminate\Support\Facades\Auth;
use App\Contracts\ClassificationContract;
use App\Http\Requests\AddDrugClassStoreRequest;

class DrugClassController extends Controller
{
    protected $drugClassContract;
    protected $classificationContract;

    public function __construct(
        DrugClassContract $drugClassContract,
        ClassificationContract $classificationContract
    ) {
        $this->drugClassContract = $drugClassContract;
        $this->classificationContract = $classificationContract;
    }

    public function index()
    {
        $userData = $this->drugClassContract->getAllDrugClass();

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.drugclasses.index', ['userData' => $userData]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.drugclasses.index', ['userData' => $userData]);
            } elseif (Auth::user()->role_id == 3) {
                return view('clerk.drugclasses.index', ['userData' => $userData]);
            } else {
                return view('404');
            }
        }
    }

    public function createDrugClass()
    {
        $classifications = $this->classificationContract->getAllClassification();

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.drugclasses.create', [
                    'classifications' => $classifications,
                ]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.drugclasses.create', [
                    'classifications' => $classifications,
                ]);
            } elseif (Auth::user()->role_id == 3) {
                return view('clerk.drugclasses.create', [
                    'classifications' => $classifications,
                ]);
            } else {
                return view('404');
            }
        }
    }

    public function storeDrugClass(AddDrugClassStoreRequest $request)
    {
        try {
            $prefix = "DRG";
            $transactionNumber = Carbon::now()->format('mHis');
            $id_number = $prefix.'-'.$transactionNumber;

            $params = $request->validated();
            $params['id_number'] = $id_number;

            $this->drugClassContract->storeDrugClass($params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.drug.class')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.drug.class')->with($notification);
                } elseif (Auth::user()->role_id == 3) {
                    return redirect()->route('clerk.all.drug.class')->with($notification);
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
                    return redirect()->route('admin.all.drug.class')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.drug.class')->with($notification);
                } elseif (Auth::user()->role_id == 3) {
                    return redirect()->route('clerk.all.drug.class')->with($notification);
                } else {
                    return view('404');
                }
            }
        }
    }

    public function editDrugClass($id)
    {
        $drugclass = $this->drugClassContract->editDrugClass($id);
        $classifications = $this->classificationContract->getAllClassification();

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.drugclasses.edit', [
                    'drugclass' => $drugclass,
                    'classifications' => $classifications,
                ]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.drugclasses.edit', [
                    'drugclass' => $drugclass,
                    'classifications' => $classifications,
                ]);
            } elseif (Auth::user()->role_id == 3) {
                return view('clerk.drugclasses.edit', [
                    'drugclass' => $drugclass,
                    'classifications' => $classifications,
                ]);
            } else {
                return view('404');
            }
        }
    }

    public function updateDrugClass(AddDrugClassStoreRequest $request, $id)
    {
        try {

            $params = $request->validated();

            $this->drugClassContract->updateDrugClass($id, $params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.drug.class')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.drug.class')->with($notification);
                } elseif (Auth::user()->role_id == 3) {
                    return redirect()->route('clerk.all.drug.class')->with($notification);
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
