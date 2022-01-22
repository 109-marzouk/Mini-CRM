<?php

namespace App\Http\Controllers\Company\Web;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

trait DataTablesTrait
{
    /**
     * Display the companies table
     *
     * @param Request $request
     * @return Factory|View
     * @throws Exception
     */
    public function getCompaniesTable(Request $request)
    {
        if($request->ajax())
        {
            $companies = Company::latest()->get();
            return Datatables::of($companies)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return view('tables_actions.company', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // TODO:: Handel this in a better way
        return null;
    }

    /**
     * Display the company employees table
     *
     * @param Request $request
     * @param $id
     * @return Factory|View
     * @throws Exception
     */
    public function getCompanyEmployeesTable(Request $request, $id)
    {
        if($request->ajax())
        {
            $company_employees = Employee::all()->where('company_id', '=', $id);
            return Datatables::of($company_employees)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return view('tables_actions.employee', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // TODO:: Handel this in a better way
        return null;
    }
}
