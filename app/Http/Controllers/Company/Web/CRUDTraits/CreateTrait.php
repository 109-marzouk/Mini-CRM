<?php

namespace App\Http\Controllers\Company\Web\CRUDTraits;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

trait CreateTrait
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('company.create');
    }
}
