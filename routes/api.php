<?php

use App\Http\Controllers\Auth\API\AuthController;
use App\Http\Controllers\Company\API\CompanyController;
use App\Http\Controllers\Employee\API\EmployeeController;

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

/*
|------------------------------------------------
| AuthController Routes
|------------------------------------------------
*/
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(
    function ()
    {
        Route::post('/logout', [AuthController::class, 'logout']);

        /*
        |------------------------------
        | CompanyController Routes
        |------------------------------
        */
        Route::controller(CompanyController::class)->group(function (){
            Route::get('companies', 'index');
            Route::post('company/create', 'store');
            Route::get('company/{id}', 'show');
            Route::post('company/{id}/edit', 'update');
            Route::delete('company/{id}', 'destroy');
        });

        /*
        |------------------------------
        | EmployeeController Routes
        |------------------------------
        */
        Route::controller(EmployeeController::class)->group(function (){
            Route::get('employees', 'index');
            Route::post('employee/create', 'store');
            Route::get('employee/{id}', 'show');
            Route::put('employee/{id}/edit', 'update');
            Route::delete('employee/{id}', 'destroy');
        });
    });
