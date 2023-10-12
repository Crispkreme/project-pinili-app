<?php

namespace App\Repositories;

use App\Models\DrugClass;
use App\Contracts\FormContract;
use Illuminate\Support\Facades\DB;

class FormRepository implements FormContract {

    protected $model;

    public function __construct(DrugClass $model)
    {
        $this->model = $model;
    }

    public function getFormData()
    {
        return $this->model->where('classification_id', 2)->pluck('name', 'id')->toArray();
    }

    public function getForm()
    {
        return $this->model->where('classification_id', 2)->get();
    }
}
