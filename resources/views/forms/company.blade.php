@php
    /*
     * Note: $input_attributes is a function that is shared between views.
     * You can find it in app\Providers\AppServiceProvider
     */

    $is_create = Illuminate\Support\Facades\Route::is('companies.create');
@endphp

<div class="card">
    <div class="card-header">
        <span style="float: left; font-size: 1.5em;">
            {{ __($is_create ? 'Add new company' : 'Edit company') }}
        </span>
        <span style="float: right">
            <a type="button" class="btn btn-primary" href="/companies">Back</a>
        </span>
    </div>
    <div class="card-body">
        <div class="mb-3">
            {!! Form::label( 'name', 'Name:', ['class' => 'col-form-label'] ) !!}
            {!! Form::text( 'name', null, $input_attributes($errors->has('name')) ) !!}
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('email', 'Email:', ['class' => 'col-form-label']) !!}
            {!! Form::email( 'email', null, $input_attributes($errors->has('email')) ) !!}
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('logo', 'Logo:', ['class' => 'col-form-label']) !!}
            {!! Form::file( 'logo', array_merge($input_attributes($errors->has('logo'), $is_create), ['accept' => 'image/*']) ) !!}
            @error('logo')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('website_url', 'Website URL:', ['class' => 'col-form-label']) !!}
            {!! Form::text( 'website_url', null, $input_attributes($errors->has('website_url')) ) !!}
            @error('website_url')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
        {!! Form::submit($is_create ? 'Add' : 'Update', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

