<?php

namespace App\Http\Controllers\Company\API\CRUDTraits;

use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
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
            new CompanyResource(Company::paginate(10)),
            'Companies fetched!'
        );
    }
}
