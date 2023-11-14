<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    // protected $userContract;

    // public function __construct(
    //     UserContract $userContract
    // ){
    //     $this->userContract = $userContract;
    // }

    public function index()
    {
        return view('manager.dashboard');
    }

    public function cashier()
    {
        return view('manager.cashiers.index');
    }
}
