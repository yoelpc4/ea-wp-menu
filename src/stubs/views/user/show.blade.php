@extends('layouts.app')

@section('page', 'User Detail')

@section('title', 'Users')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
<li class="breadcrumb-item active">User Detail</li>
@endsection

@section('content')
<div class="row">
    <div class="col-9">
        <h4 class="card-title">
            User Detail #1
        </h4>
    </div>
    <div class="col-3">
        <a href="{{ route('users.create') }}" class="btn btn-warning float-md-right">
            <i class="fa fa-plus"></i>
        </a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>John Doe</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>johndoe@gmail.com</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>Administrator</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>08/21/2019 20:14</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>09/21/2020 09:25</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <a href="{{ route('users.edit', $user)}}" class="btn btn-primary float-right">
            <i class="fa fa-edit"></i> Edit
        </a>
    </div>
</div>
@endsection