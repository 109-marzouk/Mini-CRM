<?php

namespace App\Http\Controllers\Employee\API\CRUDTraits;

use App\Http\Controllers\Employee\EmployeeBagTrait;
use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;

trait ShowTrait
{
    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        if (is_null($employee)) {
            return ApiBaseResponseTrait::sendError(
                EmployeeBagTrait::getNotFoundMessage()
            );
        }

        return ApiBaseResponseTrait::sendResponse(
            new EmployeeResource($employee),
            'Employee fetched.'
        );
    }
}
