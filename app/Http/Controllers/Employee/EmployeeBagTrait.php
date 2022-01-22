<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

trait EmployeeBagTrait {
    public static function validateRequest(Request $request, $id = null)
    {
        $linkedin_url_regx = '/^https?:\/\/((www|\w\w)\.)?linkedin.com\/((in\/[^\/]+\/?)|(pub\/[^\/]+\/((\w|\d)+\/?){3}))$/i';

        $validation_array = [
            'first_name' => [
                'bail',
                'required',
                'max:25'
            ],
            'last_name' => [
                'bail',
                'required',
                'max:25'
            ],
            'company_id' => [
                'bail',
                'required',
                'exists:companies,id'
            ],
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique('employees')->ignore($id),
                'max:50'
            ],
            'phone' => [
                'bail',
                'required',
                Rule::unique('employees')->ignore($id),
                'max:25'
            ],
            'linkedin_url' => [
                'bail',
                'url',
                'regex:' . $linkedin_url_regx,
                Rule::unique('employees')->ignore($id),
                'max:255'
            ],
        ];

        return Validator::make($request->all(), $validation_array);
    }

    public static function createEmployee($validated_data_array)
    {
        return Employee::create([
            'first_name'    => $validated_data_array['first_name'],
            'last_name'     => $validated_data_array['last_name'],
            'company_id'    => $validated_data_array['company_id'],
            'email'         => $validated_data_array['email'],
            'phone'         => $validated_data_array['phone'],
            'linkedin_url'  => $validated_data_array['linkedin_url'],
        ]);
    }

    public static function updateEmployee(Employee $employee, $validated_data)
    {
        $employee->first_name    = $validated_data['first_name'];
        $employee->last_name     = $validated_data['last_name'];
        $employee->company_id    = $validated_data['company_id'];
        $employee->email         = $validated_data['email'];
        $employee->phone         = $validated_data['phone'];
        $employee->linkedin_url  = $validated_data['linkedin_url'];
        $employee->save();
        return $employee;
    }

    public static function getNotFoundMessage()
    {
        return 'Requested employee does not exist!';
    }
}
