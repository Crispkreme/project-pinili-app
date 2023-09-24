<?php

namespace App\Repositories;

use App\Models\DrugClass;
use App\Contracts\FormContract;

class FormRepository implements FormContract {

    protected $model;

    public function __construct(DrugClass $model)
    {
        $this->model = $model;
    }

    public function getFormData()
    {
        return $this->model
        ->where('classification_id', 2)
        ->groupBy('name')
        ->pluck('name', 'id')
        ->toArray();
    }
}
