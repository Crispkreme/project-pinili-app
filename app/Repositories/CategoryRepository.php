<?php

namespace App\Repositories;

use App\Models\DrugClass;
use App\Contracts\CategoryContract;

class CategoryRepository implements CategoryContract {

    protected $model;

    public function __construct(DrugClass $model)
    {
        $this->model = $model;
    }

    public function getCategoryData()
    {
        return $this->model
        ->where('classification_id', 2)
        ->pluck('name', 'id')
        ->toArray();
    }

    public function getCategory()
    {
        return $this->model
        ->where('classification_id', 2)
        ->get();
    }
}
