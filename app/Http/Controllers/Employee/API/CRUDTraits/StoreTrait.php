<?php

namespace App\Http\Controllers\Employee\API\CRUDTraits;

use App\Http\Controllers\Employee\EmployeeHelperTrait;
use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

trait StoreTrait
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = EmployeeHelperTrait::validateRequest($request);

        if ($validator->fails())
        {
            return ApiBaseResponseTrait::sendError(
                'Failed to create this Employee!',
                $validator->errors(),
                400
            );
        }

        $validated = $validator->validated();

        $employee = EmployeeHelperTrait::createEmployee($validated);
        return ApiBaseResponseTrait::sendResponse(
            new EmployeeResource($employee),
            'Employee was created successfully!'
        );
    }
}
