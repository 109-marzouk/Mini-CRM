<?php

namespace App\Http\Controllers\Company\Web\CRUDTraits;

use App\Http\Controllers\SharedTraits\ToastNotificationTraits\SuccessToastNotificationTrait;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

trait DestroyTrait {
    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return RedirectResponse|Redirector
     */
    public function destroy(Company $company)
    {
        Company::destroy($company->id);
        SuccessToastNotificationTrait::push('Company', 'destroy');
        return redirect('companies');
    }
}
