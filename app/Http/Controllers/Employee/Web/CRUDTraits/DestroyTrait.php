<?php

namespace App\Http\Controllers\Employee\Web\CRUDTraits;

use App\Http\Controllers\SharedTraits\ToastNotificationTraits\SuccessToastNotificationTrait;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

trait DestroyTrait {
    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return RedirectResponse|Redirector
     */
    public function destroy(Employee $employee)
    {
        Employee::destroy($employee->id);
        SuccessToastNotificationTrait::push('Employee', 'destroy');
        return redirect('employees');
    }
}
