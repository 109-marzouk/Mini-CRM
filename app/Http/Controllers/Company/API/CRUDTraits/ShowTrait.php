<?php

namespace App\Http\Controllers\Company\API\CRUDTraits;

use App\Http\Controllers\Company\CompanyBagTrait;
use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
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
        $company = Company::find($id);
        if (is_null($company)) {
            return ApiBaseResponseTrait::sendError(
                CompanyBagTrait::getNotFoundMessage()
            );
        }

        return ApiBaseResponseTrait::sendResponse(
            new CompanyResource($company),
            'Company fetched.'
        );
    }
}
