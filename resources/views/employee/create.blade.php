@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {!! Form::open(['route' => 'employees.store', 'method' => 'POST']) !!}
                @include('forms.employee')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
