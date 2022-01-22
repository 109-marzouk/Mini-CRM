<?php

namespace App\Http\Controllers\Company\Web\CRUDTraits;

use App\Models\Company;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

trait EditTrait
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Factory|View
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }
}
