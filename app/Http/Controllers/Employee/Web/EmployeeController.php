<?php

namespace App\Http\Controllers\Employee\Web;

use App\Http\Controllers\Employee\EmployeeBagTrait;
use App\Http\Controllers\Employee\Web\CRUDTraits\CreateTrait;
use App\Http\Controllers\Employee\Web\CRUDTraits\DestroyTrait;
use App\Http\Controllers\Employee\Web\CRUDTraits\EditTrait;
use App\Http\Controllers\Employee\Web\CRUDTraits\IndexTrait;
use App\Http\Controllers\Employee\Web\CRUDTraits\ShowTrait;
use App\Http\Controllers\Employee\Web\CRUDTraits\StoreTrait;
use App\Http\Controllers\Employee\Web\CRUDTraits\UpdateTrait;
use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Holds some shared operations like getting array of Employee fields, or validating the request.
     * */
    use EmployeeBagTrait;

    /**
     * CRUD operations traits.
     * */
    use IndexTrait, CreateTrait, StoreTrait, ShowTrait, EditTrait, UpdateTrait, DestroyTrait;

    /**
     * Data Table Traits
     * */
    use DataTablesTrait;
}
