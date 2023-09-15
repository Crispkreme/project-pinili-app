<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Contracts\ProductContract;

class ProductRepository implements ProductContract {

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function storeProduct($params)
    {
        return $this->model->create($params);
    }

    public function getAllProduct()
    {
        return $this->model->with(['category','form'])->get();
    }

    public function getProductData()
    {
        return $this->model->pluck('medicine_name', 'id')->toArray();
    }

    public function editProduct($id)
    {
        return $this->model->with(['category','form'])->find($id);
    }

    public function updateProduct($id, $params)
    {
        $product = $this->model->findOrFail($id);
        $product->update($params);
        return $product;
    }

    public function getSpecificCategory($id)
    {
        return $this->model
        ->with(['category', 'form'])
        ->where('category_id', $id)
        ->get();
    }

    public function getSpecificForm($id)
    {
        return $this->model
        ->with(['category', 'form'])
        ->where('form_id', $id)
        ->get();
    }
}
