<?php

namespace App\Contracts;

interface PettyCashContract {

    public function getPettyCash();
    public function storePettyCash($params);
    public function getPettyCashInvoiceNumber($id);
    public function updatePettyCash($params, $id);
}