<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Contracts\FormContract;
use App\Contracts\ProductContract;
use App\Contracts\CategoryContract;
use App\Http\Requests\AddProductStoreRequest;

class ProductController extends Controller
{
    protected $productContract;
    protected $formContract;
    protected $categoryContract;

    public function __construct(
        ProductContract $productContract,
        FormContract $formContract,
        CategoryContract $categoryContract
    ) {
        $this->productContract = $productContract;
        $this->formContract = $formContract;
        $this->categoryContract = $categoryContract;
    }

    public function index()
    {
        $userData = $this->productContract->getAllProduct();
        return view('admin.products.index', ['userData' => $userData]);
    }

    public function createProduct()
    {
        $forms = $this->formContract->getFormData();
        $categories = $this->categoryContract->getCategoryData();

        return view('admin.products.create', [
            'forms' => $forms,
            'categories' => $categories,
        ]);
    }

    public function storeProduct(AddProductStoreRequest $request)
    {
        try {
            $prefix = "PRD";
            $transactionNumber = Carbon::now()->format('Ymd-His');
            $barcode = $prefix.'-'.$transactionNumber;

            $params = $request->validated();
            $params['barcode'] = $barcode;
            $params['isActive'] = 0;

            $this->productContract->storeProduct($params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.all.product')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function editProduct($id)
    {
        $product = $this->productContract->editProduct($id);
        $forms = $this->formContract->getFormData();
        $categories = $this->categoryContract->getCategoryData();

        return view('admin.products.edit', [
            'product' => $product,
            'forms' => $forms,
            'categories' => $categories,
        ]);
    }

    public function updateProduct(AddProductStoreRequest $request, $id)
    {
        try {

            $params = $request->validated();

            $this->productContract->updateProduct($id, $params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.all.product')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function searchProductByMedicineName(Request $request)
    {
        // $this->productContract->searchProductByMedicineName($request->medicineName);
        $result = $this->productContract->searchProductByMedicineName($request->medicineName);
        return response()->json($result);
    }
}
