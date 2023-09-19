<?php

namespace App\Contracts;

interface UserContract {

    public function storeUser($params);
    public function getUser($id);
    public function updateUser($id, $params);
    public function getAllUser();
    public function editUser();
    public function getAllUserData();
    public function updateUserActiveStatus($id);
    public function updateUserNotActiveStatus($id);
}
