<?php

namespace App\Http\Controllers\Company\API;

use App\Http\Controllers\Company\API\CRUDTraits\DestroyTrait;
use App\Http\Controllers\Company\API\CRUDTraits\ShowTrait;
use App\Http\Controllers\Company\API\CRUDTraits\StoreTrait;
use App\Http\Controllers\Company\API\CRUDTraits\UpdateTrait;
use App\Http\Controllers\Company\API\CRUDTraits\IndexTrait;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * => CompanyHelperTrait
     * Holds some shared operations like getting array of Employee fields, or validating the request.
     * */

    /**
     * CRUD operations traits.
     * */
    use IndexTrait, StoreTrait, ShowTrait, UpdateTrait, DestroyTrait;
}
