<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GasControlle;

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

Route::get('/dashboard', function () {
    return view('admin.admindashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home' ,[HomeController::class,'index']);
});
//admin root start
Route::get('/userDetails' ,[HomeController::class,'loadUser']);

Route::get('/useredit{data}' ,[HomeController::class,'editUser']);

//Route::post('/userupdate' ,[HomeController::class,'updateUser']);
Route::match( ['put', 'patch'], '/userupdate/{id}'  ,[HomeController::class,'updateUser']);

Route::match( ['put', 'patch','delete'], '/deleteuser{id}'  ,[HomeController::class,'deleteUser']);
//->name('editUser');

Route::get('/addgasname'  ,[GasControlle::class,'addGas']);

Route::get('/adminGasDe'  ,[GasControlle::class,'viewGas']);

Route::get('/adminImport', function () {
    return view('admin.adminImport');
});
Route::get('/adminGasTrans', [GasControlle::class,'adminVewGT']);

//Route::view('/show-report', 'report');
//Route::post('/generate-report', [ReportController::class, 'generateReport']);



Route::get('/technicianStock', [GasControlle::class,'adminVewTS']);

Route::get('/distributorStock', [GasControlle::class,'adminVewDS']);


//Route::get('/adminGasDe', function () {
//    return view('admin.adminGasDe');
//});
//admin root end

//dis root start
Route::get('/adddisgas{data}' ,[GasControlle::class,'addGasQty']);

Route::match( ['put', 'patch'], '/addgasqty/{id}'  ,[GasControlle::class,'updateGasQty']);

Route::get('/addgastrans'  ,[GasControlle::class,'addGasTrans']);

Route::get('/disHistory', [GasControlle::class,'disHistory']);

Route::get('/disGasAddHistory', [GasControlle::class,'disGasAddHistory']);
//dis root end

//tech root start
Route::get('/transTedit{data}' ,[GasControlle::class,'editTrans']);

Route::get('/techHistory' ,[GasControlle::class,'viewTransHi']);

//Route::get('/techHistory', function () {
//    return view('techni.techHistory');
//});
Route::match( ['put', 'patch'], '/updateTrans/{id}'  ,[GasControlle::class,'updateTrans']);

//tech root end

//report start
Route::get('/genareReport' ,[ReportController::class,'viewUserRepo']);
Route::get('/genareReportGasTrans' ,[ReportController::class,'genareReportGasTrans']);
Route::get('/gasDetailsRepo' ,[ReportController::class,'gasDetailsRepo']);

//report end

require __DIR__.'/auth.php';
