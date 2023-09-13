<?php

namespace App\Contracts;

interface RepresentativeContract {

    public function storeRepresentative($params);
    public function getAllRepresentative();
    public function getRepresentativeData();
    public function editRepresentative($id);
    public function updateRepresentative($id, $params);
}