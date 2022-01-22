<?php

namespace App\Http\Controllers\Company\API\CRUDTraits;

use App\Http\Controllers\Company\CompanyBagTrait;
use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $company = Company::find($id);
        if(is_null($company)){
            return ApiBaseResponseTrait::sendError(
                CompanyBagTrait::getNotFoundMessage(),
            );
        }

        $validator = CompanyBagTrait::validateRequest($request, false, $company->id);
        if ($validator->fails())
        {
            return ApiBaseResponseTrait::sendError(
                'Failed to update this company!',
                $validator->errors(),
                400
            );
        }

        $validated = $validator->validated();

        $old_logo_path = $company->logo;
        if($request->has('logo'))
        {
            Storage::delete($old_logo_path);
            $validated['logo'] = $request->file('logo')->store('public');
        }else{
            $validated['logo'] = $old_logo_path;
        }

        

        $company = CompanyBagTrait::updateCompany($company, $validated);
        return ApiBaseResponseTrait::sendResponse(
            new CompanyResource($company),
            'Company was updated successfully!'
        );
    }
}
