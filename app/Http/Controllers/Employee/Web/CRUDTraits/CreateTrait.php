<?php

namespace App\Http\Controllers\Employee\Web\CRUDTraits;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

trait CreateTrait {
    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('employee.create');
    }
}
