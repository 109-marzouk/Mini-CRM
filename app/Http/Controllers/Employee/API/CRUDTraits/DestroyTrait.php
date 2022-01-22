<?php

namespace App\Http\Controllers\Employee\API\CRUDTraits;

use App\Http\Controllers\Employee\EmployeeBagTrait;
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
                EmployeeBagTrait::getNotFoundMessage(),
            );
        }

        $employee->delete();
        return ApiBaseResponseTrait::sendResponse(
            [],
            'Employee deleted.'
        );
    }
}
