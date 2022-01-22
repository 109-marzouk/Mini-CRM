<?php

namespace App\Http\Controllers\Company\Web\CRUDTraits;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

trait IndexTrait
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('company.index');
    }
}
