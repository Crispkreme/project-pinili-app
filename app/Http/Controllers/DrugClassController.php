<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DrugClassController extends Controller
{
    protected $drugClassContract;

    public function __construct(DrugClassContract $drugClassContract) {
        $this->drugClassContract = $drugClassContract;
    }

    public function index()
    {
        $userData = $this->drugClassContract->getAllDrugClass();
        return view('admin.drugclasses.index', ['userData' => $userData]);
    }

    public function createDrugClass()
    {
        return view('admin.drugclasses.create');
    }

    public function storeDrugClass(AddCompanyStoreRequest $request)
    {
        try {
            $prefix = "CMPY";
            $transactionNumber = Carbon::now()->format('mHis');
            $id_number = $prefix.'-'.$transactionNumber;

            $params = $request->validated();
            $params['id_number'] = $id_number;

            $this->drugClassContract->storeDrugClass($params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.all.drugclass')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->route('admin.all.drugclass')->with($notification);
        }
    }

    public function editDrugClass($id)
    {
        $drugclass = $this->drugClassContract->editDrugClass($id);

        return view('admin.drugclasses.edit', [
            'drugclass' => $drugclass,
        ]);
    }

    public function updateDrugClass(AddCompanyStoreRequest $request, $id)
    {
        try {

            $params = $request->validated();

            $this->drugClassContract->updateDrugClass($id, $params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.all.drugclass')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }
}
