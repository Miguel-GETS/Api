<?php

use App\Http\Controllers\v2\BenefistController;
use App\Http\Controllers\v2\BonusController;
use App\Http\Controllers\v2\CompanyController;
use App\Http\Controllers\v2\DocumentTypesController;
use App\Http\Controllers\v2\FeatureController;
use App\Http\Controllers\v2\FieldController;
use App\Http\Controllers\v2\InvoiceController;
use App\Http\Controllers\v2\PlanController;
use App\Http\Controllers\v2\PropertyController;
use App\Http\Controllers\v2\RolController;
use App\Http\Controllers\v2\StateController;
use App\Http\Controllers\v2\StateFeeController;
use App\Http\Controllers\v2\StatusController;
use App\Http\Controllers\v2\StructureController;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    
    return $request->user();

});


Route::resource('/feature', FeatureController::class);
Route::resource('/plan', PlanController::class);

Route::resource('/benefist', BenefistController::class);
Route::resource('/state', StateController::class);

Route::resource('/structure', StructureController::class);

Route::get('/state_fee/findByState', [StateFeeController::class, 'findByState']);
Route::get('/state_fee/search', [StateFeeController::class, 'search']);
Route::resource('/state_fee', StateFeeController::class);

Route::resource('/bonus', BonusController::class);
Route::resource('/field', FieldController::class);
Route::resource('/documentType',DocumentTypesController::class);

Route::get('/invoice/pdf', [InvoiceController::class, 'pdf']);


Route::get('/invoice/company', [InvoiceController::class, 'findByCompany']);
Route::get('/invoices/{id}/{mail?}/{pdf?}', [InvoiceController::class, 'show'])->name('invoices.show');


Route::resource('/invoice', InvoiceController::class);
// Route::middleware(['Invoice'])->group(function () {
//     Route::resource('/invoice', InvoiceController::class);
// });



Route::get('/company/byEmail', [CompanyController::class, 'findByEmail']);
Route::put('/company/statusUpdate/{id}', [CompanyController::class, 'statusUpdate']);

Route::resource('/company', CompanyController::class);

Route::resource('/status', StatusController::class);


Route::resource('/rol', RolController::class);

Route::get('/property/list/{page?}', [PropertyController::class, 'list']);
Route::resource('/property', PropertyController::class);







