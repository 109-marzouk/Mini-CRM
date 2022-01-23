<?php

namespace App\Http\Controllers\Employee\Web\CRUDTraits;

use App\Http\Controllers\Employee\EmployeeHelperTrait;
use App\Http\Controllers\SharedTraits\ToastNotificationTraits\ErrorToastNotification;
use App\Http\Controllers\SharedTraits\ToastNotificationTraits\SuccessToastNotificationTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

trait StoreTrait {
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = EmployeeHelperTrait::validateRequest($request);

        if ($validator->fails())
        {
            ErrorToastNotification::push('Employee', 'store');

            return redirect(route('employees.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        EmployeeHelperTrait::createEmployee($validated);
        SuccessToastNotificationTrait::push('Employee', 'store');
        return redirect(route('companies.show', $validated['company_id']));
    }
}
