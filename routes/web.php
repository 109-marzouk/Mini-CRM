<?php

use App\Http\Controllers\Employee\Web\EmployeeController;
use App\Http\Controllers\Company\Web\CompanyController;

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
    return view('home');
});

/*
|-----------------------------------------------------------
| Data Tables Routes
|-----------------------------------------------------------
*/

    /*
    |------------------------------------------------
    | Company
    |------------------------------------------------
    */
    Route::get('companies/table', [CompanyController::class, 'getCompaniesTable'])
        ->name('companies.table');

    Route::get('company_employees/table/{id}', [CompanyController::class, 'getCompanyEmployeesTable'])
        ->name('company_employees.table');

    /*
    |------------------------------------------------
    | Employee
    |------------------------------------------------
    */
    Route::get('employees/table', [EmployeeController::class, 'getEmployeesTable'])
        ->name('employees.table');

/*
|-----------------------------------------------------------
| Web Resources
|-----------------------------------------------------------
*/
Route::resources([
    'companies' => CompanyController::class,
    'employees' => EmployeeController::class
]);

/*
|-----------------------------------------------------------
| Authentication Routes
|-----------------------------------------------------------
|
| This is authentication routes from
| AIlluminate\Support\Facades\Auth class.
|
| Note: registration is disabled.
|
*/

Auth::routes([
    'register' => false,
]);
