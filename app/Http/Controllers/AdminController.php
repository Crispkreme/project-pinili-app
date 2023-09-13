<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\RoleContract;
use App\Contracts\UserContract;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUserStoreRequest;

class AdminController extends Controller
{
    protected $userContract;
    protected $roleContract;

    public function __construct(
        UserContract $userContract,
        RoleContract $roleContract
    ){
        $this->userContract = $userContract;
        $this->roleContract = $roleContract;
    }

    public function index()
    {
        return view('admin.dashboard');
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
}
