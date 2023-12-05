<?php

namespace App\Contracts;

interface PettyCashContract {

    public function getPettyCash();
    public function storePettyCash($params);
}
