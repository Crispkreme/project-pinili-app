<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DrugClassController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\InventorySheetController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientCheckupController;
use App\Http\Controllers\PatientPrescriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['controller' => AdminController::class], function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/create/user', 'createUser')->name('create.user');
    Route::post('/store/user', 'storeUser')->name('store.user');
    Route::get('/all/user', 'getAllUser')->name('all.user');
    Route::get('/edit/user/{id}', 'editUser')->name('edit.user');
    Route::get('/update/status/active/user/{id}', 'updateUserActiveStatus')->name('update.status.active.user');
    Route::get('/update/status/not/active/user/{id}', 'updateUserNotActiveStatus')->name('update.status.notactive.user');
});
Route::group(['controller' => EntityController::class], function () {
    Route::get('/create/representative', 'createRepresentative')->name('create.representative');
    Route::post('/store/representative', 'storeRepresentative')->name('store.representative');
    Route::get('/all/representative', 'index')->name('all.representative');
    Route::get('/edit/representative/{id}', 'editRepresentative')->name('edit.representative');
    Route::get('/update/representative/{id}', 'updateRepresentative')->name('update.representative');
    Route::get('/update/status/active/entity/{id}', 'updateEntityActiveStatus')->name('update.status.active.entity');
    Route::get('/update/status/not/active/entity/{id}', 'updateEntityNotActiveStatus')->name('update.status.notactive.entity');
});
Route::group(['controller' => CompanyController::class], function () {
    Route::get('/create/company', 'createCompany')->name('create.company');
    Route::post('/store/company', 'storeCompany')->name('store.company');
    Route::get('/all/company', 'index')->name('all.company');
    Route::get('/edit/company/{id}', 'editCompany')->name('edit.company');
    Route::post('/update/company/{id}', 'updateCompany')->name('update.company');
    Route::get('/get/company/profile', 'getCompanyProfile')->name('get.company.profile');
});
Route::group(['controller' => DistributorController::class], function () {
    Route::get('/create/distributor', 'createDistributor')->name('create.distributor');
    Route::post('/store/distributor', 'storeDistributor')->name('store.distributor');
    Route::get('/all/distributor', 'index')->name('all.distributor');
    Route::get('/edit/distributor/{id}', 'editDistributor')->name('edit.distributor');
    Route::post('/update/distributor/{id}', 'updateDistributor')->name('update.distributor');
});
Route::group(['controller' => DrugClassController::class], function () {
    Route::get('/create/drug/class', 'createDrugClass')->name('create.drug.class');
    Route::post('/store/drug/class', 'storeDrugClass')->name('store.drug.class');
    Route::get('/all/drug/class', 'index')->name('all.drug.class');
    Route::get('/edit/drug/class/{id}', 'editDrugClass')->name('edit.drug.class');
    Route::post('/update/drug/class/{id}', 'updateDrugClass')->name('update.drug.class');
});
Route::group(['controller' => ProductController::class], function () {
    Route::get('/create/product', 'createProduct')->name('create.product');
    Route::post('/store/product', 'storeProduct')->name('store.product');
    Route::get('/all/product', 'index')->name('all.product');
    Route::get('/edit/product/{id}', 'editProduct')->name('edit.product');
    Route::post('/update/product/{id}', 'updateProduct')->name('update.product');
    Route::get('/get/product/data/{id}', 'getSpecificProductData')->name('get.specific.product.data');
    Route::get('/get/laboratory/data/{id}', 'getSpecificLaboratoryData')->name('get.specific.laboratory.data');
});
Route::group(['controller' => OrderController::class], function () {
    Route::get('/all/order', 'getAllOrder')->name('all.order');
    Route::get('/create/order', 'createOrder')->name('create.order');
    Route::get('/get/specific/category/{id}', 'getSpecificCategory')->name('get.specific.category');
    Route::get('/get/specific/form', 'getSpecificForm')->name('get.specific.form');
    Route::get('/get/specific/product', 'getSpecificProduct')->name('get.specific.product');
    Route::get('/pending/order', 'pendingOrder')->name('pending.order');
    Route::get('/delete/order/{id}', 'deleteOrder')->name('delete.order');
    Route::get('/approve/order/{id}', 'approveOrder')->name('approve.order');
    Route::get('/restore/deleted/order/{id}', 'getRestoreDeletedOrder')->name('restore.deleted.order');
    Route::get('/deleted/order/all', 'getAllDeletedOrder')->name('all.delete.order');
    Route::post('/store/order', 'storeOrder')->name('store.order');
    Route::get('/edit/order/{id}', 'editOrder')->name('edit.order');
    Route::get('/edit/order/data/{id}', 'editOrderData')->name('edit.order.data');
    Route::post('/update/order/{id}', 'updateOrder')->name('update.order');

    //Invoice functionality
    Route::post('/print/order/list/invoice', 'printOrderList')->name('print.order.list.invoice');
    Route::get('/print/invoice/order', 'printOrderInvoice')->name('print.invoice.order');
    Route::get('/print/invoice/order/{id}', 'printOrderInvoiceById')->name('print.invoice.user.order');
    Route::get('/daily/order/report', 'getDailyOrderReport')->name('daily.order.report');
    Route::post('/daily/order/report/all', 'getAllDailyOrderReport')->name('daily.order.report.all');
    Route::get('/all/history/company/{id}', 'getAllHistoryByCompany')->name('all.history.company');
    Route::get('/all/order/history/company/{id}', 'getAllOrderHistoryByCompany')->name('all.order.history.company');
    Route::get('/all/payment/history/company/{id}', 'getAllPaymentHistoryByCompany')->name('all.payment.history.company');
    Route::get('/all/stock/history/company/{id}', 'getAllStockHistoryByCompany')->name('all.stock.history.company');
    Route::get('/get/order/transaction', 'getOrderTransaction')->name('get.order.transaction');
    Route::get('get/order/invoice/number', 'getOrderInvoiceNumber')->name('get.order.invoice.number');

});
Route::group(['controller' => InvoiceController::class], function () {
    Route::get('/all/invoice', 'getAllInvoice')->name('all.invoice');
});
Route::group(['controller' => StockController::class], function () {
    Route::get('/stock/report', 'getAllStockReport')->name('stock.report');
    Route::get('/product/supplier/wise/report', 'getProductSupplierWiseReport')->name('product.supplier.wise.report');
});
Route::group(['controller' => InventoryController::class], function () {
    Route::post('get/product/wise/report', 'getProductWiseReport')->name('get.product.wise.report');
    Route::post('get/supplier/wise/report', 'getSupplierWiseReport')->name('get.supplier.wise.report');
});
Route::group(['controller' => InventorySheetController::class], function () {
    Route::get('/all/inventory/sheet', 'getAllInventorySheet')->name('all.inventory.sheet');
    Route::get('/add/inventory/sheet', 'addInventoryList')->name('add.inventory.sheet');
    Route::get('/edit/inventory/sheet/{id}', 'editInventorySheet')->name('edit.inventory.sheet');
    Route::post('/store/inventory/sheet', 'storeInventorySheet')->name('store.inventory.sheet');
    Route::get('/generate/inventory/sheet/{id}', 'generateInventorySheetReport')->name('generate.inventory.sheet');
    Route::get('/all/generate/inventory/sheet/{id}', 'generateInventorySheet')->name('all.generate.inventory.sheet');
});
Route::group(['controller' => PatientController::class], function () {
    Route::get('/patient', 'getPatient')->name('all.patient');
    Route::get('/create/patient', 'addPatient')->name('create.patient');
    Route::post('/store/patient', 'storePatient')->name('store.patient');
    Route::get('/edit/patient/{id}', 'editPatient')->name('edit.patient');
    Route::post('/update/patient/{id}', 'updatePatient')->name('update.patient');
    Route::get('/patient/history/{id}', 'patientHistory')->name('patient.history');
    Route::get('/patient/diagnosis/{id}', 'patientDiagnosis')->name('patient.diagnosis');
    Route::get('/patient/prescription/history/{id}', 'patientPrescriptionHistory')->name('patient.prescription.history');
    Route::post('/store/patient/diagnosis/{id}', 'storePatientDiagnosis')->name('store.patient.diagnosis');

    // CHECKUP FUNCTIONALITY
    Route::get('/patient/checkup/{id}', 'patientCheckup')->name('patient.checkup');
    Route::post('/store/patient/checkup/{id}', 'storePatientCheckup')->name('store.patient.checkup');

    // FOLLOWUP CHECKUP
    Route::get('/patient/followup/checkup/{id}', 'patientFollowCheckup')->name('patient.followup.checkup');
    Route::post('/store/patient/followup/checkup/{id}', 'storePatientFollowCheckup')->name('store.patient.followup.checkup');
});

Route::group(['controller' => PatientCheckupController::class], function () {
    Route::get('/patient/checkup/print/{id}', 'patientCheckupPdf')->name('patient.checkup.print');
    Route::get('/patient/checkup', 'getAllPatientCheckup')->name('all.patient.checkup');
    // Route::get('/patient/followup/checkup/{id}', 'createPatientFollowupCheckup')->name('create.patient.followup.checkup');
    Route::get('/patient/create/checkup/{id}', 'createPatientCheckup')->name('create.patient.checkup');
    Route::post('/store/patient/followup/checkup', 'storePatientFollowupCheckup')->name('store.patient.followup.checkup');
});

Route::group(['controller' => PatientPrescriptionController::class], function () {
    Route::get('/patient/all/prescription', 'getPatientPrescription')->name('all.patient.prescription');
    Route::post('/create/patient/prescription', 'storePatientPrescription')->name('store.patient.prescription');
});
