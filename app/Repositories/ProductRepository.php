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
        return $this->model
        ->with(['category', 'form'])
        ->where('id', '!=', 1)
        ->orderBy('id','desc')
        ->get();
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
            ->select('form_id')
            ->with(['category', 'form'])
            ->where('category_id', $id)
            ->distinct()
            ->pluck('form_id');
    }

    public function getSpecificForm($id)
    {
        return $this->model
        ->with(['category', 'form'])
        ->where('form_id', $id)
        ->get();
    }

    public function updateInventoryData($id, $params)
    {
        $inventory = $this->model->findOrFail($id);
        $inventory->update($params);
        return $inventory;
    }

    public function getAllProductWithActiveStatus()
    {
        return $this->model
        ->with(['category', 'form'])
        ->pluck('medicine_name', 'id')
        ->where('isActive', 0)
        ->toArray();
    }

    public function searchProductByMedicineName($params)
    {
        return $this->model
        ->with(['category', 'form'])
        ->where('medicine_name', 'like', '%' . $params . '%')
        ->take(5)
        ->get();
    }

    public function getSpecificProductData($id)
    {
        return $this->model
            ->with(['category', 'form'])
            ->where('isActive', 0)
            ->where('id', $id)
            ->get(['medicine_name', 'generic_name', 'description', 'id'])
            ->toArray();
    }
}
