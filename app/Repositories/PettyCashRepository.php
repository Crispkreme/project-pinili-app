<?php

namespace App\Repositories;

use App\Models\PettyCash;
use App\Contracts\PettyCashContract;

class PettyCashRepository implements PettyCashContract {

    protected $model;

    public function __construct(PettyCash $model)
    {
        $this->model = $model;
    }

    public function getPettyCash()
    {
        return $this->model
        ->orderBy('id', 'desc')
        ->get();
    }

    public function storePettyCash($params)
    {
        return $this->model->create($params);
    }

    public function getPettyCashInvoiceNumber($id)
    {
        return $this->model->with([
            "user",
            "petty_cash_status",
        ])
        ->findOrFail($id);
    }

    public function updatePettyCash($params, $id)
    {
        $pettyCashData = $this->model->findOrFail($id);
        $pettyCashData->update($params);
        return $pettyCashData;
    }
}