<?php

namespace App\Contracts;

interface RoleContract {

    public function getRoles();
    public function getRoleName($id);
}
