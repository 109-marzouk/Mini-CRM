@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'PUT', 'files' => true]) !!}
                @include('forms.employee')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
