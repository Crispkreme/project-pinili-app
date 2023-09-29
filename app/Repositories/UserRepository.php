<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddUserStoreRequest;
use App\Contracts\UserContract;

class UserRepository implements UserContract {

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function storeUser($params)
    {
        return $this->model->create($params);
    }

    public function getUser($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function updateUser($id, $params)
    {
        $this->model->where('id', $id)->update($params);
        $updatedUser = $this->model->findOrFail($id);
        return $updatedUser;
    }

    public function editUser()
    {
        $id = Auth::user()->id;
        return $this->model->find($id);
    }

    public function getAllUser()
    {
        return $this->model->get();
    }

    public function getAllUserData()
    {
        return $this->model->pluck('name', 'id')->toArray();
    }

    public function updateUserActiveStatus($id)
    {
        $order = $this->model->findOrFail($id);
        $order->update([
            'isActive' => 1,
        ]);
        return $order;
    }

    public function updateUserNotActiveStatus($id)
    {
        $order = $this->model->findOrFail($id);
        $order->update([
            'isActive' => 0,
        ]);
        return $order;
    }

    public function getApprovedByUser($id)
    {
        return $this->model->where('id', $id)->pluck('name')->first();
    }

    public function getRecievedByUser($id)
    {
        return $this->model->where('id', $id)->pluck('name')->first();
    }
}
