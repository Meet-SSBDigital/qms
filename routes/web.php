<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\QuotationController;
use App\Http\Controllers\quotstion_subcontroller;
use App\Http\Controllers\Notification;
use App\Http\Controllers\AnnualplanController;


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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/company', 'company');
Route::post('/company', [App\Http\Controllers\CompanymasterController::class, 'store'])->name('company');
Route::get('/company', [App\Http\Controllers\CompanymasterController::class, 'show'])->name('company');
Route::view('searchcompany', 'searchcompany');
Route::any('searchcompany', [App\Http\Controllers\CompanymasterController::class, 'index'])->name('2');
Route::any('delete/{company_id}/{isactive}', [App\Http\Controllers\CompanymasterController::class, 'destroy'])->name('comapany.delete');
// Route::view('updatecompany', 'updatecompany');
Route::get('update/{company_id}', [App\Http\Controllers\CompanymasterController::class, 'edit'])->name('update');
Route::any('/edit/{company_id}', [App\Http\Controllers\CompanymasterController::class, 'update'])->name('update2.0');

Route::view('addproject', 'addproject')->name('ADD_project');
// Route::view('projecttable', 'projecttable')->name('table_project');

Route::post('addproject', [App\Http\Controllers\ProjectmasterController::class, 'store'])->name('addproject');
Route::get('addproject', [App\Http\Controllers\ProjectmasterController::class, 'show'])->name('addproject0');
  

// for projectmasterprojecttable

// Route::view('searchproject', 'searchproject');

Route::any('searchproject', [App\Http\Controllers\ProjectmasterController::class, 'index'])->name('getprojectdata');
Route::post('/searchproject', [App\Http\Controllers\ProjectmasterController::class, 'edit'])->name('getprojectdatabyid');
Route::post('/getsearchproject', [App\Http\Controllers\ProjectmasterController::class, 'optionsdata'])->name('');
// Route::post('searchproject', [App\Http\Controllers\ProjectmasterController::class, 'edit'])->name('');
Route::view('editproject', 'editproject');
Route::any('deleteproject/{project_id}',[App\Http\Controllers\ProjectmasterController::class, 'destroy'] );

Route::any('editproject/{project_id}',[App\Http\Controllers\ProjectmasterController::class, 'databyid'] )->name('project.edit');
Route::any('updateproject/{project_id}',[App\Http\Controllers\ProjectmasterController::class, 'update'] )->name('project.update');
// project.update

//for quotation 
Route::view('quotation', 'quotation');
Route::any('quotation', [QuotationController::class, 'index'])->name('displaydata');

Route::post('/quotation', [QuotationController::class, 'show'])->name('quotationdatabtajax');
Route::any('/quotationdata', [QuotationController::class, 'store'])->name('quotationdatainsert');
// Route::any('/quotation', [QuotationController::class, 'edit'])->name('geteditdata');
// 
Route::any('Delete/{sub_id}', [QuotationController::class, 'destroy'])->name('reports.download');
Route::any('subquotation/{sub_id}', [quotstion_subcontroller::class, 'update'])->name('Update.qts');
Route::any('/subquotationupdate', [quotstion_subcontroller::class, 'edit'])->name('Updatebyid.qts');
// Route::get('/subquotation/{sub_id}', function ($id) {
//     //
// })->where('sub_id', '[0-9]+');

//          sub-qtsC:\xampp\htdocs\Laravel\qms\resources\views\subquotationids.blade.phpC:\xampp\htdocs\Laravel\qms\resources\views\subquotation.blade.php
Route::view('subquotation', 'subquotation');
// Route::any('/subquotation', [quotstion_subcontroller::class, 'fetchdata'])->name('subquotationdatainsert');
// Route::post('/subquotationbyid', [quotstion_subcontroller::class, 'fetchdatabyid'])->name('subquotationdatafetch');


Route::any('quotation-send-msg', [Notification::class, 'sendnotification'])->name('sendnotification');
Route::any('Export', [AnnualplanController::class, 'show'])->name('show-Export');
Route::any('importdata', [AnnualplanController::class, 'import'])->name('Audit-import');
Route::any('Macid', [AnnualplanController::class, 'index'])->name('Audit-indexid');












Route::get('sendmail', [FlightController::class,'sendnotifications']);
Route::get('/excel', function ()
{
    return view('excelimport');
}); 