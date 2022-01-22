<?php

namespace App\Http\Controllers\Employee\API;

use App\Http\Controllers\Employee\API\CRUDTraits\DestroyTrait;
use App\Http\Controllers\Employee\API\CRUDTraits\ShowTrait;
use App\Http\Controllers\Employee\API\CRUDTraits\StoreTrait;
use App\Http\Controllers\Employee\API\CRUDTraits\UpdateTrait;
use App\Http\Controllers\Employee\API\CRUDTraits\IndexTrait;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * => EmployeeBagTrait
     * Holds some shared operations like getting array of Employee fields, or validating the request.
     * */

    /**
     * CRUD operations traits.
     * */
    use IndexTrait, StoreTrait, ShowTrait, UpdateTrait, DestroyTrait;
}
