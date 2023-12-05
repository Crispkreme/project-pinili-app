<?php

namespace App\Repositories;

use App\Models\PettyCash;
use App\Contracts\PettyCashContract;

class PettyCashRepository implements PettyCashContract {

    protected $model;

    public function __construct(PettyCash $model)
    {
        $this->model = $model;
    }

    public function getPettyCash()
    {
        return $this->model
        ->get();
    }

    public function storePettyCash($params)
    {
        return $this->model->create($params);
    }
}
