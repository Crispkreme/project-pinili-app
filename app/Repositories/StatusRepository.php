<?php

namespace App\Repositories;

use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use App\Contracts\StatusContract;

class StatusRepository implements StatusContract {

    protected $model;

    public function __construct(Status $model)
    {
        $this->model = $model;
    }

    public function getAllStatusData()
    {
        return $this->model
        ->pluck('status', 'id')
        ->toArray();
    }
}
