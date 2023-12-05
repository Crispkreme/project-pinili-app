<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Contracts\PettyCashContract;
use App\Contracts\PurchaseItemContract;

class PettyCashController extends Controller
{
    protected $pettyCashContract;
    protected $purchaseItemContract;

    public function __construct(
        PettyCashContract $pettyCashContract,
        PurchaseItemContract $purchaseItemContract
    ) {
        $this->pettyCashContract = $pettyCashContract;
        $this->purchaseItemContract = $purchaseItemContract;
    }

    public function index()
    {
        $pettyCash = $this->pettyCashContract->getPettyCash();

        return view("clerk.petty_cashes.index", [
            'pettyCash' => $pettyCash,
        ]);
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
            $file_date = Carbon::now();
            $invoice_number = $prefix.'-'.$transactionNumber;
            $petty_cash_status_id = 1;
            $isApprove = 1;
            $user_id = Auth::user()->id;

            $data = [
                'user_id' => $user_id,
                'petty_cash_status_id' => $petty_cash_status_id,
                'invoice_number' => $invoice_number,
                'file_date' => $file_date,
                'remarks' => $request->remarks,
                'paid_amount' => $request->paid_amount,
                'discount' => $request->discount,
                'total_amount' => $request->total_amount,
                'change' => $request->change,
                'isApprove' => $isApprove,
            ];

            $pettyCash = $this->pettyCashContract->storePettyCash($data);
            $pettyCashId = $pettyCash->id;

            for ($i = 0; $i < count($request->purchase_item); $i++) {

                $data = [
                    'petty_cash_id' => $pettyCashId,
                    'purchase_item' => $request->purchase_item[$i],
                    'subtotal' => $request->subtotal[$i],
                    'qty' => $request->qty[$i],
                    'price' => $request->price[$i],
                    'purchase_remarks' => $request->purchase_remarks[$i],
                ];

                $this->purchaseItemContract->storePurchaseItem($data);
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

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.petty.cash')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.petty.cash')->with($notification);
                } elseif (Auth::user()->role_id == 3) {
                    return redirect()->route('clerk.petty.cash')->with($notification);
                } else {
                    return view('404');
                }
            }
        }
    }

    public function editPettyCash($id)
    {
        $purchaseItem = $this->purchaseItemContract->getPurchaseItemList($id);

        return view("clerk.petty_cashes.edit", [
            'purchaseItem' => $purchaseItem,
            'pettyCashId' => $id,
        ]);
    }

    public function updatePettyCash(Request $request, $id)
    {

        DB::beginTransaction();

        try {

            $data = [
                'remarks' => $request->remarks,
                'paid_amount' => $request->paid_amount,
                'discount' => $request->discount,
                'total_amount' => $request->total_amount,
                'change' => $request->change,
            ];

            $this->pettyCashContract->updatePettyCash($id, $data);

            for ($i = 0; $i < count($request->purchase_item); $i++) {

                $data = [
                    'purchase_item' => $request->purchase_item[$i],
                    'subtotal' => $request->subtotal[$i],
                    'qty' => $request->qty[$i],
                    'price' => $request->price[$i],
                    'purchase_remarks' => $request->purchase_remarks[$i],
                ];

                $this->purchaseItemContract->updatePurchaseItem($data, $request->id);
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

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.petty.cash')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.petty.cash')->with($notification);
                } elseif (Auth::user()->role_id == 3) {
                    return redirect()->route('clerk.petty.cash')->with($notification);
                } else {
                    return view('404');
                }
            }
        }
    }
}