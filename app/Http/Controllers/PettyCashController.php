<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Contracts\PettyCashContract;

class PettyCashController extends Controller
{
    protected $pettyCashContract;

    public function __construct(
        PettyCashContract $pettyCashContract
    ) {
        $this->pettyCashContract = $pettyCashContract;
    }

    public function index()
    {
        return view("clerk.petty_cashes.index");
    }

    public function createPettyCash()
    {
        return view("clerk.petty_cashes.create");
    }

    public function storePettyCash(Request $request)
    {
        DB::beginTransaction();

        try {
            $prefix = "PTY";
            $transactionNumber = Carbon::now()->format('Ymd-His');
            $file_date = Carbon::now()->format('Y-m-d');
            $invoice_number = $prefix.'-'.$transactionNumber;
            $petty_cash_status_id = 1;
            $isApprove = 1;
            $user_id = Auth::user()->id;

            for ($i = 0; $i < count($request->purchase_item); $i++) {

                $data = [
                    'user_id' => $user_id,
                    'petty_cash_status_id' => $petty_cash_status_id,
                    'invoice_number' => $invoice_number,
                    'purchase_item' => $request->purchase_item[$i],
                    'amount' => $request->amount[$i],
                    'subtotal' => $request->subtotal[$i],
                    'qty' => $request->qty[$i],
                    'file_date' => $file_date,
                    'remarks' => $request->remarks,
                    'paid_amount' => $request->paid_amount[$i],
                    'discount' => $request->discount[$i],
                    'total_amount' => $request->total_amount[$i],
                    'isApprove' => $isApprove,
                ];

                $this->pettyCashContract->storePettyCash($data);
            }

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Data saved successfully!',
            ];

            return redirect()->route('clerk.petty.cash')->with($notification);

        } catch (\Exception $e) {

            DB::rollback();

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->route('admin.petty.cash')->with($notification);
        }
    }
}
