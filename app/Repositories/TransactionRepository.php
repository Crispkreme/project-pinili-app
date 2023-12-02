<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Contracts\TransactionContract;

class TransactionRepository implements TransactionContract {

    protected $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function createTransaction($params)
    {
        return $this->model
        ->create($params);
    }
    public function getAllTransaction()
    {
        return $this->model
        ->get();
    }
}
