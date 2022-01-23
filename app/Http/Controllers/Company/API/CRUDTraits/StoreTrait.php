<?php

namespace App\Http\Controllers\Company\API\CRUDTraits;

use App\Http\Controllers\Company\CompanyHelperTrait;
use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use App\Http\Resources\CompanyResource;
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
        $validator = CompanyHelperTrait::validateRequest($request);

        if ($validator->fails())
        {
            return ApiBaseResponseTrait::sendError(
                'Failed to create this company!',
                $validator->errors(),
                400
            );
        }

        $validated = $validator->validated();
        $validated['logo'] = $request->file('logo')->store('public');

        $company = CompanyHelperTrait::createCompany($validated);
        return ApiBaseResponseTrait::sendResponse(
            new CompanyResource($company),
            'Company was created successfully!'
        );
    }
}
