<?php

namespace App\Contracts;

interface DistributorContract {

    public function storeDistributor($params);
    public function getAllDistributor();
    public function editDistributor($id);
    public function updateDistributor($id, $params);
}
