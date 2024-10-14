<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgetPasswordManager;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\InvoiceController;

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
    return view('livewire.landing');
});

Route::get('/storagelink', function () {
    Artisan::call('storage:link');
});



Route::get('/projectmaster', function () {
    return view('projectmaster.listing-single');
});

Route::get('check-helper', [MainController::class, 'checkHelper']);
Route::get('testcode/{id}', [JobController::class, 'testcode'])->name('testcode');

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::get('dashboard', [AuthController::class, 'dashboard']);



Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgetPasswordManager::class, "resetPassword"])->name("reset.password");
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost'])->name('reset.password.post');




use App\Http\Livewire\Login2;

Route::get('login2', Login2::class);

use App\Http\Livewire\Landing;
use App\Http\Livewire\Index;
use App\Http\Livewire\HomeFoundation;
use App\Http\Livewire\Buttons;
use App\Http\Livewire\FormAdvanced;
use App\Http\Livewire\JobAdd;
use App\Http\Livewire\JobEdit;
use App\Http\Livewire\JobInsertPdf;
use App\Http\Livewire\JobInsertFiles;
use App\Http\Livewire\GetProject;
use App\Http\Livewire\Students;
// use App\Http\Livewire\Counter;
use App\Http\Livewire\InvoiceDetails;
use App\Http\Livewire\NhLoanDetails;
use App\Http\Livewire\OrderDetails;
use App\Http\Livewire\HLoanDetails;
use App\Http\Livewire\OpeDetails;
use App\Http\Livewire\QuotationDetails;


Route::get('/jobs/data', [Index::class, 'getData'])->name('home_jobs_data');
Route::get('/fund/data', [HomeFoundation::class, 'getData'])->name('home_fund_data');
Route::view('/welcome', 'welcome');
Route::get('homefoundation', [AuthController::class, 'homefoundation'])->name('homefoundation');
//Route::view('/homefoundation', 'homefoundation');
Route::view('/testlivewireview', 'testlivewireview');

Route::get('landing', Landing::class);
// Route::get('index', Index::class);
Route::get('buttons', Buttons::class);
Route::get('form-advanced', FormAdvanced::class);



//job
//Route::get('job-add', JobAdd::class);
//new form
Route::get('joborder-add', [AuthController::class, 'JobOrderAdd'])->middleware('auth')->name('joborder.joborder-add');
//edit form
Route::get('joborder-edit/{id}', [AuthController::class, 'JobOrderEdit'])->middleware('auth')->name('joborder.joborder-edit');

Route::get('job-edit', JobEdit::class);
Route::get('job-insert-pdf', JobInsertPdf::class);
Route::resource("/job", JobController::class);
// Route::get('test', [JobController::class, 'test']);
Route::get('editJobInsertPdf/{id}', [JobController::class, 'editJobInsertPdf']);
Route::get('editJobInsertFiles/{id}/{mainfolder}/{subfolder}', [JobController::class, 'editJobInsertFiles'])->name('editJobInsertFiles');
Route::post('uploadfile2s3/{id}/{jobcode}/{uploadfiletype}', [JobController::class, 'uploadfile2s3'])->name('uploadfile2s3');
Route::post('dropzone/storepdf', [JobController::class, 'dropzoneStorepdf'])->name('dropzone.storepdf');
Route::post('dropzone/storeimg', [JobController::class, 'dropzoneStoreimg'])->name('dropzone.storeimg');
Route::post('dropzone/storefiles', [JobController::class, 'dropzoneStoreFiles'])->name('dropzone.storefiles');
Route::post('dropzone/dz_storefiles', [JobController::class, 'Dz_StoreFiles'])->name('dropzone.dz_storefiles');
Route::post('dropzone/dz_storefoundationfiles', [JobController::class, 'Dz_StoreFoundationFiles'])->name('dropzone.dz_storefoundationfiles');
Route::get('deletejobfile/{id}/{fn}', [JobController::class, 'deletejobfile'])->name('deletejobfile');
Route::get('deletefoundationfile/{id}/{fn}', [JobController::class, 'deletefoundationfile'])->name('deletefoundationfile');
//Route::get('/postx', Postx::class);
Route::get('/students', Students::class);
// Route::get('/counter', Counter::class);
Route::get('export-data', [AuthController::class, 'ExportData'])->middleware('auth')->name('joborder.export-data');



//Invoice by Note
Route::get('/invoice-details/{id}', [InvoiceDetails::class, 'render_details'])->name('invoice.details');
route::get('/receipt-details/{id}', [InvoiceDetails::class, 'render_receipt'])->name('receipt.details');
Route::get('/invoice-details-og', [InvoiceDetails::class, 'render_original'])->name('invoice.detailsog');
Route::get('/invoicelist', [InvoiceController::class, 'invoiceList'])->name('invoice.invoiceList'); //todo

Route::get('/invoice-edit/{id}', [InvoiceDetails::class, 'render_edit'])->name('invoice.edit');
Route::post('/invoice-edit/{id}', [InvoiceDetails::class, 'update'])->name('invoice.update');

Route::get('/invoice-create', [InvoiceDetails::class, 'render_create'])->name('invoice.create'); //todo
Route::post('/invoice-create', [InvoiceDetails::class, 'store'])->name('invoice.store'); //todo

Route::get('/nhloan-details/{id}', [NhLoanDetails::class, 'render_details'])->name('nhloan.details');

Route::get('/nhloan-edit/{id}', [NhLoanDetails::class, 'render_edit'])->name('nhloan.edit'); //todo
Route::post('/nhloan-edit/{id}', [NhLoanDetails::class, 'update'])->name('nhloan.update');//todo

Route::get('/order-details/{id}', [OrderDetails::class, 'render_details'])->name('order.details');

Route::get('/hloan-details/{id}', [HLoanDetails::class, 'render_details'])->name('hloan.details');

Route::get('/ope-details/{id}', [OPEDetails::class, 'render_details'])->name('ope.details');

Route::get('/quotation-details-short/{id}', [QuotationDetails::class, 'render_details_short_form'])->name('quotation-short.details');
Route::get('/quotation-details-full/{id}', [QuotationDetails::class, 'render_details_long_form'])->name('quotation-long.details');
