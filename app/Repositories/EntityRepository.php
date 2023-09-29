<?php

namespace App\Repositories;

use App\Models\Entity;
use Illuminate\Support\Facades\Auth;
use App\Contracts\EntityContract;

class EntityRepository implements EntityContract {

    protected $model;

    public function __construct(Entity $model)
    {
        $this->model = $model;
    }

    public function getSpecificSupplierName($id)
    {
        return $this->model->where('id', $id)->pluck('name')->first();
    }
}
