<?php

namespace App\Repositories;

use App\Models\Classification;
use Illuminate\Support\Facades\Auth;
use App\Contracts\ClassificationContract;

class ClassificationRepository implements ClassificationContract {

    protected $model;

    public function __construct(Classification $model)
    {
        $this->model = $model;
    }

    public function getAllClassification()
    {
        return $this->model
        ->pluck('classification', 'id')
        ->toArray();
    }
}
