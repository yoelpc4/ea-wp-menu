@extends('layouts.auth')

@section('page', 'Register')

@section('title', 'Create New Account')

@section('content')
    {!! Form::open(['method' => 'post', 'url' => 'register', 'class' => 'form-control-line']) !!}
    <div class="form-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('name') ? 'has-warning' : '' }}">
                    {!! Form::label('name', 'Name*') !!}
                    {!! Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? 'form-control-warning' : ''), 'maxlength' => '30', 'placeholder' => 'Type your name', 'autocomplete' => 'on', 'autofocus', 'required']) !!}
                    @if ($errors->has('name'))
                        <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
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
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-warning' : '' }}">
                    {!! Form::label('password_confirmation', 'Password Confirmation*') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control ' . ($errors->has('password_confirmation') ? 'form-control-warning' : ''), 'placeholder' => 'Type your password confirmation', 'required']) !!}
                    @if ($errors->has('password_confirmation'))
                        <div class="form-control-feedback">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions text-center">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">
                    <i class="fa fa-user-plus"></i> Register
                </button>
            </div>
            <div class="col-md-12 m-t-10">
                <a href="{{ route('login') }}">Back</a> to login page
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
