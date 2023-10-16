<?php

namespace App\Contracts;

interface TransactionContract {

    public function createTransaction($params);
    public function getAllTransaction();
}
