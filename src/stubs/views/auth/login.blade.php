@extends('layouts.auth')

@section('page', 'Login')

@section('title', 'Login to Your Account')

@section('content')
    {!! Form::open(['method' => 'post', 'url' => 'login', 'class' => 'form-control-line']) !!}
    <div class="form-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('email') ? 'has-warning' : '' }}">
                    {!! Form::label('email', 'Email*') !!}
                    {!! Form::email('email', null, ['class' => 'form-control ' . ($errors->has('email') ? 'form-control-warning' : ''), 'maxlength' => '40', 'placeholder' => 'Type your email', 'autocomplete' => 'on', 'required']) !!}
                    @if ($errors->has('email'))
                        <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('password') ? ' has-warning' : '' }}">
                    {!! Form::label('password', 'Password*') !!}
                    {!! Form::password('password', ['class' => 'form-control ' . ($errors->has('password') ? 'form-control-warning' : ''), 'placeholder' => 'Type your password', 'autocomplete' => 'on', 'required']) !!}
                    @if ($errors->has('password'))
                        <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        {!! Form::checkbox('remember', true, old('remember') ? 'checked' : '', ['id' => 'remember', 'class' => 'custom-control-input']) !!}
                        {!! Form::label('remember', 'Remember me', ['class' => 'custom-control-label']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('password.request') }}" class="float-md-right">
                    <i class="fa fa-lock"></i> Forgot password ?
                </a>
            </div>
        </div>
    </div>
    <div class="form-actions text-center">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">
                    <i class="fa fa-sign-in-alt"></i> Login
                </button>
            </div>
            <div class="col-md-12 m-t-10">
                Don't have account? <a href="{{ route('register') }}"><b>Register here</b></a>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
