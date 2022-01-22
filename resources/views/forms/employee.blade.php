@php
    /*
     * Note: $input_attributes is a function that is shared between views.
     * You can find it in app\Providers\AppServiceProvider
     */

    $is_create = Illuminate\Support\Facades\Route::is('employees.create');
    $linked_in_regex = 'https?:\/\/((www|\w\w)\.)?linkedin.com\/((in\/[^\/]+\/?)|(pub\/[^\/]+\/((\w|\d)+\/?){3}))';

    $company_id   = request()->input('company_id');
@endphp

<div class="card">
    <div class="card-header">
        <span style="float: left; font-size: 1.5em;">
            {{ __(
                $is_create ?
                    'Add new employee' . (!is_null($company_id) ? ' to a company' : '')
                    :
                    'Edit employee'
                )
            }}
        </span>
        <span style="float: right">
            <a type="button" class="btn btn-primary" href="{{ URL::route('employees.index') }}">Back</a>
        </span>
    </div>
    <div class="card-body">
        <div class="mb-3">
            {!! Form::label('first_name', 'First Name:', ['class' => 'col-form-label']) !!}
            {!! Form::text('first_name', null, $input_attributes($errors->has('first_name'))) !!}
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('last_name', 'Last Name:', ['class' => 'col-form-label']) !!}
            {!! Form::text('last_name', null, $input_attributes($errors->has('last_name'))) !!}
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            @if(is_null($company_id))
                {!! Form::label('company_id', 'Company:', ['class' => 'col-form-label']) !!}
                {!! Form::select(
                    'company_id',
                    \App\Models\Company::pluck('id', 'name')->flip(),
                    null,
                    [
                        'class' => 'form-select ' . ($errors->has('company_id') ? ' is-invalid' : null),
                        'required',
                        'placeholder' => 'Select employee\'s company...',
                    ]
                 ) !!}
                @error('company_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            @else()
                {!! Form::hidden('company_id', $company_id) !!}
            @endif
        </div>
        <div class="mb-3">
            {!! Form::label('email', 'Email:', ['class' => 'col-form-label']) !!}
            {!! Form::email('email', null, $input_attributes($errors->has('email'))) !!}
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('phone', 'Phone:', ['class' => 'col-form-label']) !!}
            {!! Form::tel('phone', null, $input_attributes($errors->has('phone'))) !!}
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('linkedin_url', 'LinkedIn Profile:', ['class' => 'col-form-label']) !!}
            {!! Form::text(
                'linkedin_url',
                null,
                $input_attributes(
                    $errors->has('last_name'),
                    true,
                    $linked_in_regex,
                    'Please enter a valid LinkedIn profile link.'
                )
             ) !!}
            @error('linkedin_url')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        {!! Form::submit($is_create ? 'Add' : 'Update', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

