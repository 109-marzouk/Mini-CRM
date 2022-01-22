<?php

namespace App\Http\Controllers\Company\Web\CRUDTraits;

use App\Http\Controllers\Company\CompanyBagTrait;
use App\Http\Controllers\SharedTraits\ToastNotificationTraits\ErrorToastNotification;
use App\Http\Controllers\SharedTraits\ToastNotificationTraits\SuccessToastNotificationTrait;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

trait UpdateTrait
{
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Company $company
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, Company $company)
    {
        $validator = CompanyBagTrait::validateRequest($request, false, $company->id);
        if ($validator->fails())
        {
            ErrorToastNotification::push('company', 'update');
            return redirect(route('companies.edit'))
                ->withErrors($validator)
                ->withInput();
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

        CompanyBagTrait::updateCompany($company, $validated);

        SuccessToastNotificationTrait::push('Company', 'update');
        return redirect('companies');
    }
}
