@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {!! Form::open(['route' => 'companies.store', 'method' => 'POST', 'files' => true]) !!}
                    @include('forms.company')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

