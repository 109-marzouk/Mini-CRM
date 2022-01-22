@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @auth()
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <a class="col" href="{{ URL::route('companies.index') }}">
                                <div class="card">
                                    <img
                                        src="https://blog.bizvibe.com/wp-content/uploads/2020/04/top-finance-companies.jpg"
                                        class="card-img-top" alt="Companies">
                                    <div class="card-body">
                                        <h5 class="card-title">Companies</h5>
                                    </div>
                                </div>
                            </a>
                            <a class="col" href="{{ URL::route('employees.index') }}">
                                <div class="card">
                                    <img
                                        src="https://s3.us-east-1.amazonaws.com/co-assets/assets/image-transforms/images/963014/team-meeting3_d88e4f0344a8f3f0bf6d644a30195abc.jpg"
                                        class="card-img-top"
                                        alt="Employees">
                                    <div class="card-body">
                                        <h5 class="card-title">Employees</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
        @guest
            <div class="container col-xl-10 col-xxl-8 px-4 py-5">
                <div class="row align-items-center g-lg-5 py-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-4 fw-bold lh-1 mb-3">Welcome to Mini-CRM system</h1>
                        <p class="col-lg-10 fs-4">Create companies, employees and manage them now! Just login with your admin credentials.</p>
                    </div>
                    <div class="col-md-10 mx-auto col-lg-6">
                        @include('forms.login')
                    </div>
                </div>
            </div>
            @endguest
    </div>
</div>
@endsection
