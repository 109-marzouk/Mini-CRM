<?php

namespace App\Http\Controllers\Employee\Web\CRUDTraits;

use App\Http\Controllers\Employee\EmployeeBagTrait;
use App\Http\Controllers\SharedTraits\ToastNotificationTraits\ErrorToastNotification;
use App\Http\Controllers\SharedTraits\ToastNotificationTraits\SuccessToastNotificationTrait;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

trait UpdateTrait {
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Employee $employee
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, Employee $employee)
    {
        $validator = EmployeeBagTrait::validateRequest($request, $employee->id);

        if ($validator->fails())
        {
            ErrorToastNotification::push('Employee', 'update');
            return redirect(route('employees.edit'))
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        EmployeeBagTrait::updateEmployee($employee, $validated);
        SuccessToastNotificationTrait::push('Employee', 'update');
        return redirect('employees');
    }
}
