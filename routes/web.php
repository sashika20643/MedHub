<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DrugController;

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



Route::middleware('isadmin')->group(function (){
    Route::get('/drugs/create', [DrugController::class,'create'])->name('admin.drugs.create');
    Route::post('/drugs/store', [DrugController::class,'store'])->name('admin.drugs.store');
    Route::get('/drugs', [DrugController::class,'index'])->name('admin.drugs.index');
    Route::delete('/drugs/{drug}', [DrugController::class,'destroy'])->name('drugs.destroy');
});

});
