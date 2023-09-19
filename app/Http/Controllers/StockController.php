<?php

namespace App\Http\Controllers;

use App\Contracts\OrderContract;
use Illuminate\Http\Request;

class StockController extends Controller
{
    protected $orderContract;

    public function __construct(
        OrderContract $orderContract,
    ){
        $this->orderContract = $orderContract;
    }

    public function getAllStockReport()
    {
        $userData = $this->orderContract->getAllStockReport();
        return view('admin.stocks.index', ['userData' => $userData]);
    }
}
