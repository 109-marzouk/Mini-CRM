<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

trait CompanyBagTrait {

    public static function validateRequest(Request $request, $logo_required = true, $id = null)
    {
        $validation_array = [
            'name' => [
                'bail',
                'required',
                'max:50'
            ],
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique('companies')->ignore($id),
                'max:50'
            ],
            'logo' => [
                'bail',
                $logo_required ? 'required' : '',
                'image',
                'dimensions:min_width=100,min_height=100'
            ],
            'website_url' => [
                'bail',
                'required',
                'url',
                Rule::unique('companies')->ignore($id),
                'max:255'
            ],
        ];

        return Validator::make($request->all(), $validation_array);
    }

    public static function createCompany($validated_data_array)
    {
         return Company::create([
            'name'        => $validated_data_array['name'],
            'email'       => $validated_data_array['email'],
            'logo'        => $validated_data_array['logo'],
            'website_url' => $validated_data_array['website_url'],
        ]);
    }

    public static function updateCompany(Company $company, $validated_data)
    {
        $company->name          = $validated_data['name'];
        $company->email         = $validated_data['email'];
        $company->logo          = $validated_data['logo'];
        $company->website_url   = $validated_data['website_url'];
        $company->save();
        return $company;
    }

    public static function getNotFoundMessage()
    {
        return 'Requested company does not exist!';
    }

}
