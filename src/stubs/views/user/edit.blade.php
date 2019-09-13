@extends('layouts.app')

@section('page', 'Edit User')

@section('title', 'Users')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
<li class="breadcrumb-item active">Edit User</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="card-title">
            Edit User
        </h4>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        {!! Form::model($user, ['method' => 'put', 'route' => ['users.update', $user]]) !!}
            @include('user.form', ['buttonText' => 'Update'])
        {!! Form::close() !!}
    </div>
</div>
@endsection