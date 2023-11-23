<?php

namespace App\Http\Controllers;

use App\Contracts\RepresentativeContract;
use App\Contracts\RoleContract;
use App\Http\Requests\AddRepresentativeStoreRequest;
use App\Models\Entity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class EntityController extends Controller
{
    protected $roleContract;
    protected $representativeContract;

    public function __construct(
        RoleContract $roleContract,
        RepresentativeContract $representativeContract
    ){
        $this->roleContract = $roleContract;
        $this->representativeContract = $representativeContract;
    }

    public function index()
    {
        $userData = $this->representativeContract->getAllRepresentative();

        $currentRoute = Route::currentRouteName();
        if (str_starts_with($currentRoute, 'admin.')) {
            return view('admin.representatives.index', [
                'userData' => $userData
            ]);
        } elseif (str_starts_with($currentRoute, 'manager.')) {
            return view('manager.representatives.index', [
                'userData' => $userData
            ]);
        } else {
            return view('404');
        }
    }

    public function createRepresentative()
    {
        $roles = $this->roleContract->getRoles();

        $currentRoute = Route::currentRouteName();
        if (str_starts_with($currentRoute, 'admin.')) {
            return view('admin.representatives.create', ['roles' => $roles]);
        } elseif (str_starts_with($currentRoute, 'manager.')) {
            return view('manager.representatives.create', ['roles' => $roles]);
        } else {
            return view('404');
        }
    }

    public function storeRepresentative(AddRepresentativeStoreRequest $request)
    {
        try {
            $prefix = "USER";
            $transactionNumber = Carbon::now()->format('mHis');
            $id_number = $prefix.'-'.$transactionNumber;

            $role = $this->roleContract->getRoleName($request->role_id);

            $params = $request->validated();
            $params['id_number'] = $id_number;
            $params['role'] = $role->role_name;
            $params['isActive'] = 1;

            $this->representativeContract->storeRepresentative($params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.all.representative')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->route('admin.all.representative')->with($notification);
        }
    }

    public function editRepresentative($id)
    {
        $representative = $this->representativeContract->editRepresentative($id);
        $roles = $this->roleContract->getRoles();
        return view('admin.representatives.edit', [
            'representative' => $representative,
            'roles' => $roles
        ]);
    }

    public function updateRepresentative(AddRepresentativeStoreRequest $request, Entity $entity)
    {
        try {

            $params = $request->validated();

            $this->representativeContract->updateRepresentative($entity->id, $params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.all.representative')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->route('admin.all.representative')->with($notification);
        }
    }

    public function updateEntityActiveStatus($id)
    {
        try {

            $this->representativeContract->updateEntityActiveStatus($id);

            return redirect()->back();

        } catch (\Exception $e) {
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return view('admin.profile.change-password')->with($notification);
        }
    }

    public function updateEntityNotActiveStatus($id)
    {
        try {

            $this->representativeContract->updateEntityNotActiveStatus($id);

            return redirect()->back();

        } catch (\Exception $e) {
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return view('admin.profile.change-password')->with($notification);
        }
    }
}
