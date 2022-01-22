<?php

namespace App\Http\Controllers\Employee\API\CRUDTraits;

use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;

trait IndexTrait
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return ApiBaseResponseTrait::sendResponse(
            new EmployeeResource(Employee::paginate(10)),
            'Employees fetched!'
        );
    }
}
