@extends('layouts.app')

@section('page', 'Create User')

@section('title', 'Users')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
<li class="breadcrumb-item active">Create User</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="card-title">
            Create User
        </h4>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        {!! Form::open(['method' => 'post', 'route' => 'users.store']) !!}
            @include('user.form', ['buttonText' => 'Store'])
        {!! Form::close() !!}
    </div>
</div>
@endsection