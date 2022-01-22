<?php

namespace App\Http\Controllers\Company\Web\CRUDTraits;

use App\Http\Controllers\Company\CompanyBagTrait;
use App\Http\Controllers\SharedTraits\ToastNotificationTraits\ErrorToastNotification;
use App\Http\Controllers\SharedTraits\ToastNotificationTraits\SuccessToastNotificationTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

trait StoreTrait
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = CompanyBagTrait::validateRequest($request);
        if ($validator->fails())
        {
            ErrorToastNotification::push('company', 'create');
            return redirect(
                route('companies.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();
        $validated['logo'] = $request->file('logo')->store('public');

        CompanyBagTrait::createCompany($validated);

        SuccessToastNotificationTrait::push('Company', 'store');
        return redirect('companies');
    }
}
