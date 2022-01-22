<?php

namespace App\Http\Controllers\Company\API\CRUDTraits;

use App\Http\Controllers\Company\CompanyBagTrait;
use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use App\Models\Company;
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
        $company = Company::find($id);
        if(is_null($company))
        {
            return ApiBaseResponseTrait::sendError(
                CompanyBagTrait::getNotFoundMessage(),
            );
        }

        $company->delete();
        return ApiBaseResponseTrait::sendResponse(
            [],
            'Company deleted.'
        );
    }
}
