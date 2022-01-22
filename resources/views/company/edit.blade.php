@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {!! Form::model($company, ['route' => ['companies.update', $company->id], 'method' => 'PUT', 'files' => true]) !!}
                    @include('forms.company')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection



