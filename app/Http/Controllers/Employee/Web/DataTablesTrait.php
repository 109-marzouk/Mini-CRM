<?php

namespace App\Http\Controllers\Employee\Web;

use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

trait DataTablesTrait
{
    /**
     * Display the employees table
     *
     * @param Request $request
     * @return Factory|View
     * @throws Exception
     */
    public function getEmployeesTable(Request $request)
    {
        if($request->ajax())
        {
            $employees = Employee::join(
                'companies',
                'employees.company_id', '=', 'companies.id'
            )->get(['employees.*', 'companies.name as company_name']);

            return Datatables::of($employees)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return view('tables_actions.employee', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return null;
    }
}
