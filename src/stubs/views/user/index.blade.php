@extends('layouts.app')

@section('page', 'User List')

@section('title', 'Users')

@section('breadcrumbs')
<li class="breadcrumb-item active">Users</li>
@endsection

@section('content')
<div class="row">
    <div class="col-9">
        <h4 class="card-title">
            User List
        </h4>
    </div>
    <div class="col-3">
        <a href="{{ route('users.create') }}" class="btn btn-warning float-md-right">
            <i class="fa fa-plus"></i>
        </a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            {{-- {!! $dataTable->table(['class' => 'table table-bordered table-striped']) !!} --}}
            <table id="users" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john@doe.com</td>
                        <td>Administrator</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- {!! $dataTable->scripts() !!} --}}
    <script>
        $(function() {
            $('#users').DataTable();
        });
    </script>
@endpush