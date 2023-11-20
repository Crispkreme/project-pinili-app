<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Contracts\FormContract;
use App\Contracts\ProductContract;
use App\Contracts\CategoryContract;
use App\Contracts\InventoryContract;
use App\Contracts\LaboratoryContract;
use App\Http\Requests\AddProductStoreRequest;

class ProductController extends Controller
{
    protected $productContract;
    protected $formContract;
    protected $categoryContract;
    protected $inventoryContract;
    protected $laboratoryContract;

    public function __construct(
        ProductContract $productContract,
        FormContract $formContract,
        CategoryContract $categoryContract,
        InventoryContract $inventoryContract,
        LaboratoryContract $laboratoryContract
    ) {
        $this->productContract = $productContract;
        $this->formContract = $formContract;
        $this->categoryContract = $categoryContract;
        $this->inventoryContract = $inventoryContract;
        $this->laboratoryContract = $laboratoryContract;
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

    public function getSpecificProductData($id)
    {
        $products = $this->inventoryContract->getSpecificInventoryByProductID($id);
        return response()->json($products);
    }

    public function getSpecificLaboratoryData($id)
    {
        $laboratories = $this->laboratoryContract->getSpecificLaboratoryByID($id);
        return response()->json($laboratories);
    }
}
