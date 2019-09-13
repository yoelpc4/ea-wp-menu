@extends('layouts.auth')

@section('page', 'Password Recovery')

@section('title', 'Password Recovery')

@section('content')
    <div class="alert alert-info m-b-20">
        <h4 class="text-info">
            <i class="fa fa-info-circle"></i> Info
        </h4>
        Enter your email to receives password recovery instruction!
    </div>
    {!! Form::open(['method' => 'post', 'route' => 'password.email', 'class' => 'form-control-line']) !!}
    <div class="form-group {{ $errors->has('email') ? 'has-warning' : '' }}">
        {!! Form::label('email', 'Email*') !!}
        {!! Form::email('email', null, ['class' => 'form-control ' . ($errors->has('email') ? 'form-control-warning' : ''), 'maxlength' => '40', 'placeholder' => 'Type your password', 'autocomplete' => 'on', 'required']) !!}
        @if ($errors->has('email'))
            <div class="form-control-feedback">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="form-group text-center">
        <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">
            <i class="fa fa-send"></i> Send Instruction
        </button>
    </div>
    <div class="form-group">
        <div class="col-xs-12 text-center">
            <a href="{{ route('login') }}">Back</a> to login page
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@push('scripts')
    <script>
        $(function () {
            @if(session('status'))
            swal({
                title: 'Info',
                text: 'Password recovery instruction has been sent, please check your email inbox!',
                type: 'info',
                showCancelButton: false,
                confirmButtonText: 'Close'
            });
            @endif
        });
    </script>
@endpush
