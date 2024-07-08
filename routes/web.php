<?php

use App\Http\Controllers\Cashbook;
use App\Http\Controllers\CashbookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DPSController;
use App\Http\Controllers\FDRController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CroronJobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransectionController;
use App\Http\Controllers\MemberProfileController;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('backend/master');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Profile Edit,Update,Delete
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/project/update/', [ProfileController::class, 'project_update'])->name('project.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Dashboade,Cashbook Show Blade
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/cashbooks', [CashbookController::class, 'cashbook'])->name('cashbook');
    Route::get('/profile/account/holder/{id}', [MemberProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/all/account/{id}', [MemberProfileController::class, 'profileView'])->name('view.more');

    //Personal Account List,Create,Update
    Route::get('/perosonal/account/list', [MemberController::class, 'list'])->name('member.list');
    Route::post('/perosonal/account/create/post', [MemberController::class, 'create'])->name('member.create.post');
    Route::get('/perosonal/account/create', [MemberController::class, 'createShow'])->name('member.create');
    Route::get('/perosonal/account/edit/{id}', [MemberController::class, 'edit'])->name('edit.member.account');
    Route::post('/perosonal/account/update/{id}', [MemberController::class, 'update'])->name('member.update');
    Route::get('/perosonal/account/delete/{id}', [MemberController::class, 'delete'])->name('member.delete');

    //Staff Create,Update,List
    Route::get('/staff/list', [StaffController::class, 'index'])->name('staff.list');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/staff/create/post', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
    Route::post('/staff/update/{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::get('/staff/delete/{id}', [StaffController::class, 'destroy'])->name('staff.delete');

    //Fixed Deposit Create,update,List  
    Route::get('/fixed/Deposit/closed/list', [FDRController::class, 'fdr_list'])->name('fdr.list');
    Route::get('/fixed/Deposit/list/all', [FDRController::class, 'fdr_list_all'])->name('fdr.list.all');
    Route::get('/fixed/Deposit/create', [FDRController::class, 'fdr_create'])->name('fdr.create');
    Route::get('/fixed/Deposit/edit/{id}', [FDRController::class, 'fdr_edit'])->name('fdr.edit');
    Route::post('/fixed/Deposit/update/{id}', [FDRController::class, 'fdr_edit_post'])->name('fdr.edit.post');
    Route::post('/fixed/Deposit/create/post', [FDRController::class, 'fdr_create_post'])->name('fdr.create.post');
    Route::get('/fixed/Deposit/status/update/{id}', [FDRController::class, 'fdr_status_post'])->name('fdr.status.change');

    //Deposit Create,update,List  
    Route::get('/deposit/closed/list', [DPSController::class, 'dps_list'])->name('dps.list');
    Route::get('/deposit/list/all', [DPSController::class, 'dps_list_all'])->name('dps.list.all');
    Route::get('/deposit/create', [DPSController::class, 'dps_create'])->name('dps.create');
    Route::post('/deposit/create/post', [DPSController::class, 'dps_create_post'])->name('dps.create.post');
    Route::get('/deposit/edit/{id}', [DPSController::class, 'dps_edit'])->name('dps.edit');
    Route::post('/deposit/update/{id}', [DPSController::class, 'dps_edit_post'])->name('dps.edit.post');
    Route::get('/deposit/status/update/{id}', [DPSController::class, 'dps_status_post'])->name('dps.status.change');

    //Loan create,Update,Delete And Status Update
    Route::get('/loan/list', [LoanController::class, 'loan_list'])->name('loan.list');
    Route::get('/loan/close/list', [LoanController::class, 'loan_list_close'])->name('closed.loan.list');
    Route::get('/loan/create', [LoanController::class, 'loan_create'])->name('loan.create');
    Route::post('/loan/create/post', [LoanController::class, 'loan_create_post'])->name('loan.create.post');
    Route::get('/loan/edit/{id}', [LoanController::class, 'loan_edit'])->name('loan.edit');
    Route::post('/loan/update/{id}', [LoanController::class, 'loan_edit_post'])->name('loan.edit.post');
    Route::get('/loan/status/{id}', [LoanController::class, 'loan_status'])->name('loan.status.change');

    //All Income Types Added here......
    Route::get('/fees/create', [OfficeController::class, 'fees_create'])->name('fees.create');
    Route::post('/fees/create/post', [OfficeController::class, 'fees_create_post'])->name('fees.store');
    Route::post('/fees/update/{id}', [OfficeController::class, 'fees_edit_post'])->name('fees.update');
    Route::get('/fees/delete/{id}', [OfficeController::class, 'fees_delete'])->name('fees.delete');

    //Income Transection Route.......
    Route::get('/income/transection', [OfficeController::class, 'incomingTransection'])->name('incoming.transection');
    Route::post('/income/store', [OfficeController::class, 'incomeStore'])->name('income.store');
    Route::get('/income/edit/{id}', [OfficeController::class, 'income_edit'])->name('income.edit');
    Route::post('/income/update', [OfficeController::class, 'income_update'])->name('income.update');

    //Expense Transection Route ....
    Route::get('/expense/transection', [OfficeController::class, 'outgoingTransection'])->name('outgoing.transection');
    Route::post('/expense/store', [OfficeController::class, 'expense_store'])->name('expense.store');
    Route::get('/expense/edit/{id}', [OfficeController::class, 'expense_edit'])->name('expense.edit');
    Route::post('/expense/update', [OfficeController::class, 'expense_update'])->name('expense.update');


    // For Update Amount Using Schedule.......
    Route::get('/fdr/intereset/increment', [CroronJobController::class, 'fdr_interest_increment']);
    Route::get('/loan/interest/increment', [CroronJobController::class, 'loan_interest_increment']);

    //Transection History or status ..........
    Route::post('/transection/{id}', [TransectionController::class, 'transection'])->name('transection');
    Route::get('/transection/history', [TransectionController::class, 'transection_history'])->name('transection.history');
    Route::get('/transection/history/{id}', [TransectionController::class, 'single_transection_history'])->name('single.transection');
});

require __DIR__ . '/auth.php';
