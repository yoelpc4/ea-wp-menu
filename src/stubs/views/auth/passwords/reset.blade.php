@extends('layouts.auth')

@section('page', 'Reset Password')

@section('title', 'Reset Password')

@section('content')
    {!! Form::open(['method' => 'post', 'route' => 'password.update', 'class' => 'form-control-line']) !!}
    {!! Form::hidden('token', $token) !!}
    <div class="form-group {{ $errors->has('email') ? 'has-warning' : '' }}">
        {!! Form::label('email', 'Email*') !!}
        {!! Form::email('email', null, ['class' => 'form-control ' . ($errors->has('email') ? 'form-control-warning' : ''), 'maxlength' => '40', 'placeholder' => 'Type your email', 'autocomplete' => 'on', 'required']) !!}
        @if ($errors->has('email'))
            <div class="form-control-feedback">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="form-group {{ $errors->has('password') ? ' has-warning' : '' }}">
        {!! Form::label('password', 'Password*') !!}
        {!! Form::password('password', ['class' => 'form-control ' . ($errors->has('password') ? 'form-control-warning' : ''), 'placeholder' => 'Type your password', 'autocomplete' => 'on', 'required']) !!}
        @if ($errors->has('password'))
            <div class="form-control-feedback">{{ $errors->first('password') }}</div>
        @endif
    </div>
    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-warning' : '' }}">
        {!! Form::label('password_confirmation', 'Password Confirmation*') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control ' . ($errors->has('password_confirmation') ? 'form-control-warning' : ''), 'placeholder' => 'Type your password confirmation', 'required']) !!}
        @if ($errors->has('password_confirmation'))
            <div class="form-control-feedback">{{ $errors->first('password_confirmation') }}</div>
        @endif
    </div>
    <div class="form-group text-center">
        <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">
            <i class="fa fa-refresh"></i> Reset
        </button>
    </div>
    {!! Form::close() !!}
@endsection
