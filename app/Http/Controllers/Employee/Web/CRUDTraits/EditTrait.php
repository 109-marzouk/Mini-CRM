<?php

namespace App\Http\Controllers\Employee\Web\CRUDTraits;

use App\Models\Employee;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

trait EditTrait {
    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Factory|View
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }
}
