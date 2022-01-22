@php
    /*
     * Note: $input_attributes is a function that is shared between views.
     * You can find it in app\Providers\AppServiceProvider
     */
@endphp

{!! Form::open(['route' => 'login', 'method' => 'POST']) !!}

    <div class="mb-3">
        {!! Form::label('email', 'Email: (admin@admin.com)', ['class' => 'col-form-label']) !!}
        {!! Form::email( 'email', 'admin@admin.com', $input_attributes($errors->has('email')) ) !!}
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="mb-3">
        {!! Form::label('password', 'Password: (password)', ['class' => 'col-form-label']) !!}
        {!! Form::password( 'password', $input_attributes($errors->has('password')) ) !!}
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="mb-3">
        {!! Form::checkbox( 'remember', 'Remember me?', false) !!}
        {!! Form::label('remember', 'Remember me?', ['class' => 'col-form-label']) !!}
    </div>

    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
    {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
