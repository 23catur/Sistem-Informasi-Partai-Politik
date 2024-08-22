<?php

use App\Http\Controllers\AlgorithmController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\AssesmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\SubCriteriaController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\AddressForm;
use App\Http\Livewire\RegisterPage;
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
    return view('pages.home');
});

Route::get('register', RegisterPage::class)->name('register');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::resource('criterias', CriteriaController::class)->except(['destroy']);
    Route::get('criterias/{criteria}/destroy', [CriteriaController::class, 'destroy'])->name('criterias.destroy');

    Route::resource('sub-criterias', SubCriteriaController::class)->except(['index', 'show', 'destroy']);
    Route::get('sub-criterias/{sub_criteria}/destroy', [SubCriteriaController::class, 'destroy'])->name('sub-criterias.destroy');

    Route::get('alternatives/assesments', [AssesmentController::class, 'index'])->name('alternatives.assesments.index');
    Route::get('alternatives/{alternative}/assesments', [AssesmentController::class, 'edit'])->name('alternatives.assesments.edit');
    Route::post('alternatives/{alternative}/assesments', [AssesmentController::class, 'syncCriteria'])->name('alternatives.assesments.sync');
    Route::get('alternatives/{alternative}/address/create', AddressForm::class)->name('alternatives.address.create');
    Route::get('/alternatives/{alternative}/criteria-component', [AlternativeController::class, 'criteriaComponentForm'])->name('alternatives.criteria-component.index');
    Route::post('alternatives/{alternative}/criteria-component', [AlternativeController::class, 'criteriaComponentCreate'])->name('alternatives.criteria-component.store');
    Route::get('/alternatives/{alternative}/documents', [AlternativeController::class, 'uploadDocumentForm'])->name('alternatives.documents.index');
    Route::post('/alternatives/{alternative}/documents', [AlternativeController::class, 'uploadDocumentStore'])->name('alternatives.documents.store');

    Route::resource('alternatives', AlternativeController::class)->except(['destroy']);
    Route::get('alternatives/{alternative}/destroy', [AlternativeController::class, 'destroy'])->name('alternatives.destroy');

    Route::middleware('superadmin')->group(function () {
        Route::resource('users', UserController::class)->except(['destroy', 'show']);
        Route::get('users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::get('algorithm', [AlgorithmController::class, 'index'])->name('algorithm.index');
    Route::get('result', [AlgorithmController::class, 'rest'])->name('algorithm.result');
    Route::get('/change-password', [UserController::class, 'changePasswordPage'])->name('users.change_password.index');
    Route::put('/change-password', [UserController::class, 'changePassword'])->name('users.change_password.update');

    Route::get('profile', [UserController::class, 'profile'])->name('users.profile.index');
    Route::get('profile/edit', [UserController::class, 'profileEdit'])->name('users.profile.edit');
    Route::put('profile/update', [UserController::class, 'profileUpdate'])->name('users.profile.update');

    Route::get('periods', [PeriodController::class, 'index'])->name('periods.index');
    Route::get('result/export', [AlgorithmController::class, 'export'])->name('result.export');
    Route::get('send-mail-result', [AlgorithmController::class, 'sendMailResult'])->name('result.mail');
    Route::get('reset-data', [AlgorithmController::class, 'resetData'])->name('reset-data');

});
