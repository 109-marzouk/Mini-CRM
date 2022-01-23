<?php

namespace App\Http\Controllers\Employee\API\CRUDTraits;

use App\Http\Controllers\Employee\EmployeeHelperTrait;
use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;

trait DestroyTrait
{
    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if(is_null($employee))
        {
            return ApiBaseResponseTrait::sendError(
                EmployeeHelperTrait::getNotFoundMessage(),
            );
        }

        $employee->delete();
        return ApiBaseResponseTrait::sendResponse(
            [],
            'Employee deleted.'
        );
    }
}
