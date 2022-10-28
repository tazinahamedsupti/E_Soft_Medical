<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdduserController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestInfoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

//Auth route for user
Route::group(['missleware' => ['auth']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});


Route::get('new_patient', [PatientController::class, 'new_patient'])->middleware(['auth']);
Route::get('patient_list', [PatientController::class, 'patient_list'])->middleware(['auth']);
Route::get('patient_profile/{id}', [PatientController::class, 'show'])->middleware(['auth']);
Route::post('patient_insert', [PatientController::class, 'store'])->middleware(['auth']);
Route::post('search', [PatientController::class, 'search'])->middleware(['auth']);


Route::get('payment_collection', [PaymentController::class, 'index'])->middleware(['auth']);
Route::get('due_form', [PaymentController::class, 'due_form'])->middleware(['auth']);

Route::get('test_category_entry', [TestController::class, 'index'])->middleware(['auth']);
Route::get('test_entry', [TestController::class, 'test_entry'])->middleware(['auth']);
Route::get('delete/{id}', [TestController::class, 'destroy'])->middleware(['auth']);
Route::post('add_test_category', [TestController::class, 'store'])->middleware(['auth']);

Route::post('add_test_info', [TestInfoController::class, 'store'])->middleware(['auth']);

Route::post('lab_test_insert', [LabController::class, 'testrecord'])->middleware(['auth']);
Route::post('add_service_list', [LabController::class, 'store'])->middleware(['auth']);


Route::get('service_list/{test_reference}', [AccountsController::class, 'view_service'])->middleware(['auth']);
Route::post('update_service_list', [AccountsController::class, 'update_service_list'])->middleware(['auth']);
Route::get('service_list/{test_reference}', [AccountsController::class, 'view_service'])->middleware(['auth']);
Route::get('/invoice/{test_reference}', [AccountsController::class, 'invoice'])->middleware(['auth']);
Route::get('/test_result/{test_reference}', [AdduserController::class, 'test_result'])->middleware(['auth']);

Route::get('/add_user', [AdduserController::class, 'add_user'])->middleware(['auth']);






// ajax root
Route::get('/findPrice', [TestInfoController::class, 'findPrice'])->middleware(['auth']);
Route::get('/findReferrer', [TestInfoController::class, 'findReferrer'])->middleware(['auth']);
Route::get('/findTestId', [TestInfoController::class, 'findTestId'])->middleware(['auth']);






require __DIR__.'/auth.php';
