<?php

namespace App\Http\Controllers\Employee\API\CRUDTraits;

use App\Http\Controllers\Employee\EmployeeBagTrait;
use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

trait UpdateTrait
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if(is_null($employee)){
            return ApiBaseResponseTrait::sendError(
                EmployeeBagTrait::getNotFoundMessage(),
            );
        }

        $validator = EmployeeBagTrait::validateRequest($request, $employee->id);
        if ($validator->fails())
        {
            return ApiBaseResponseTrait::sendError(
                'Failed to update this Employee!',
                $validator->errors(),
                400
            );
        }

        $validated = $validator->validated();

        $employee = EmployeeBagTrait::updateEmployee($employee, $validated);
        return ApiBaseResponseTrait::sendResponse(
            new EmployeeResource($employee),
            'Employee was updated successfully!'
        );
    }
}
