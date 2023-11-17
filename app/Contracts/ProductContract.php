<?php

namespace App\Contracts;

interface ProductContract {

    public function storeProduct($params);
    public function getAllProduct();
    public function getAllProductWithActiveStatus();
    public function getSpecificCategory($id);
    public function getSpecificForm($id);
    public function getProductData();
    public function editProduct($id);
    public function updateProduct($id, $params);
    public function updateInventoryData($id, $params);
    public function searchProductByMedicineName($params);
}
