<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckerController extends Controller
{
    public function index()
    {
        return view('checker.dashboard');
    }
}
