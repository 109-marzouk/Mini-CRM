<?php

namespace App\Http\Controllers\Company\Web\CRUDTraits;

use App\Models\Company;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

trait ShowTrait
{
    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return Factory|View
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }
}
