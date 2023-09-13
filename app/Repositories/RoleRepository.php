<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddUserStoreRequest;
use App\Contracts\RoleContract;

class RoleRepository implements RoleContract {

    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function getRoles()
    {
        return Role::pluck('role_name', 'id')->toArray();
    }

    public function getRoleName($id)
    {
        return $this->model->find($id);
    }
}
