<?php

namespace App\Http\Controllers\Company\Web;

use App\Http\Controllers\Company\CompanyBagTrait;
use App\Http\Controllers\Company\Web\CRUDTraits\CreateTrait;
use App\Http\Controllers\Company\Web\CRUDTraits\DestroyTrait;
use App\Http\Controllers\Company\Web\CRUDTraits\EditTrait;
use App\Http\Controllers\Company\Web\CRUDTraits\IndexTrait;
use App\Http\Controllers\Company\Web\CRUDTraits\ShowTrait;
use App\Http\Controllers\Company\Web\CRUDTraits\StoreTrait;
use App\Http\Controllers\Company\Web\CRUDTraits\UpdateTrait;
use Illuminate\Routing\Controller;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Holds some shared operations like getting array of Employee fields, or validating the request.
     * */
    use CompanyBagTrait;

    /**
     * CRUD operations traits.
     * */
    use IndexTrait, CreateTrait, StoreTrait, ShowTrait, EditTrait, UpdateTrait, DestroyTrait;

    /**
     * Data Table Traits
     * */
    use DataTablesTrait;
}
