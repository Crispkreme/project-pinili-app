<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Contracts\DrugClassContract;
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
        return view('admin.drugclasses.index', ['userData' => $userData]);
    }

    public function createDrugClass()
    {
        $classifications = $this->classificationContract->getAllClassification();

        return view('admin.drugclasses.create', [
            'classifications' => $classifications,
        ]);
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

            return redirect()->route('admin.all.drug.class')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->route('admin.all.drug.class')->with($notification);
        }
    }

    public function editDrugClass($id)
    {
        $drugclass = $this->drugClassContract->editDrugClass($id);
        $classifications = $this->classificationContract->getAllClassification();

        return view('admin.drugclasses.edit', [
            'drugclass' => $drugclass,
            'classifications' => $classifications,
        ]);
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

            return redirect()->route('admin.all.drug.class')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }
}
