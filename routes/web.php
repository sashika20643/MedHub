<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\QuotationController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[HomeController::class,'Home'])->name('dashboard');
    Route::get('/home',[HomeController::class,'Home'])->name('dashboard');



    Route::get('/dashboard/upload-prescription', [PrescriptionController::class, 'showUploadForm'])->name('user.upload.prescription');
    Route::post('/dashboard/store-prescription', [PrescriptionController::class, 'Upload'])->name('user.store.prescription');

    Route::get('/dashboard/all-prescriptions', [PrescriptionController::class, 'show'])->name('user.prescriptions');
    Route::get('/dashboard/quotation/{id}', [QuotationController::class, 'userQuotation'])->name('user.quotation');
    Route::get('/dashboard/quotation-approve/{id}', [QuotationController::class, 'QuotationApprove'])->name('user.quotation.approve');
    Route::get('/dashboard/quotation-reject/{id}', [QuotationController::class, 'QuotationReject'])->name('user.quotation.reject');





Route::middleware('isadmin')->group(function (){
    Route::get('/drugs/create', [DrugController::class,'create'])->name('admin.drugs.create');
    Route::post('/drugs/store', [DrugController::class,'store'])->name('admin.drugs.store');
    Route::get('/drugs', [DrugController::class,'index'])->name('admin.drugs.index');
    Route::delete('/drugs/{drug}', [DrugController::class,'destroy'])->name('drugs.destroy');

    Route::get('/admin-prescriptions', [QuotationController::class,'index'])->name('admin.prescriptions.index');
    Route::get('/quotation/add/{id}', [QuotationController::class,'create'])->name('admin.add-quotation');
    Route::post('/admin-prescriptions/add-quotation', [QuotationController::class,'store'])->name('admin.store-quotation');
});

});
