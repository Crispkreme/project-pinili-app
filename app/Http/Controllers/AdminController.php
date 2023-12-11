<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Contracts\RoleContract;
use App\Contracts\UserContract;
use App\Contracts\PatientContract;
use Illuminate\Support\Facades\Hash;
use App\Contracts\PatientCheckupContract;
use App\Http\Requests\AddUserStoreRequest;

class AdminController extends Controller
{
    protected $userContract;
    protected $roleContract;
    protected $patientCheckupContract;
    protected $patientContract;

    public function __construct(
        UserContract $userContract,
        PatientContract $patientContract,
        PatientCheckupContract $patientCheckupContract,
        RoleContract $roleContract
    ){
        $this->userContract = $userContract;
        $this->roleContract = $roleContract;
        $this->patientContract = $patientContract;
        $this->patientCheckupContract = $patientCheckupContract;
    }

    public function index()
    {
        try {

            $totalPatient = $this->patientContract->getTotalPatient();

            $totalPatientByMonth = $this->patientContract->getTotalPatientPerMonth();
            $countPatients = $totalPatientByMonth->totalPatients;

            $patientCheckups = $this->patientCheckupContract->getPatientCheckup();

            $isNew = $this->patientCheckupContract->getNewPatientData();

            $isNewMonthly = $this->patientCheckupContract->getMonthlyNewPatientData();

            $isFollowUp = $this->patientCheckupContract->getFollowupPatientData();

            $isFollowUpMonthly = $this->patientCheckupContract->getMonthlyFollowupPatientData();

            return view('admin.dashboard', [
                'totalPatient' => $totalPatient,
                'countPatients' => $countPatients,
                'patientCheckups' => $patientCheckups,
                'isNew' => $isNew,
                'isFollowUp' => $isFollowUp,
                'isNewMonthly' => $isNewMonthly,
                'isFollowUpMonthly' => $isFollowUpMonthly,
            ]);

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function getAllUser()
    {
        try {

            $userData = $this->userContract->getAllUser();

            return view('admin.users.index', ['userData' => $userData]);

        } catch (\Exception $e) {
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return view('admin.profile.change-password')->with($notification);
        }
    }

    public function createUser()
    {
        $roles = $this->roleContract->getRoles();
        return view('admin.users.create', ['roles' => $roles]);
    }

    public function storeUser(AddUserStoreRequest $request)
    {
        try {

            $role = $this->roleContract->getRoleName($request->role_id);
            $passwordHash = Hash::make($request->password);

            $params = $request->validated();
            $params['password'] = $passwordHash;
            $params['position'] = $role->role_name;
            $params['isActive'] = 1;

            $this->userContract->storeUser($params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.dashboard')->with($notification);

        } catch (\Exception $e) {
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return view('admin.profile.change-password')->with($notification);
        }
    }

    public function editUser()
    {
        $users = $this->userContract->editUser();
        $roles = $this->roleContract->getRoles();
        return view('admin.users.edit', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function updateUserActiveStatus($id)
    {
        try {

            $this->userContract->updateUserActiveStatus($id);

            return redirect()->back();

        } catch (\Exception $e) {
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return view('admin.profile.change-password')->with($notification);
        }
    }

    public function updateUserNotActiveStatus($id)
    {
        try {

            $this->userContract->updateUserNotActiveStatus($id);

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