<?php

namespace App\Http\Controllers\Employee\Web\CRUDTraits;

use App\Models\Employee;

trait ShowTrait {
    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return void
     */
    public function show(Employee $employee)
    {
        /*
        $id = $employee->id;
        return view('employee.show', compact('id'));
        */
    }
}
