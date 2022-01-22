<?php

namespace App\Http\Controllers\Employee\Web\CRUDTraits;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

trait IndexTrait {
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('employee.index');
    }
}
