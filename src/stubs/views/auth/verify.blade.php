@extends('layouts.auth')

@section('page', 'Email Verification Request')

@section('title', 'Email Verification Request')

@section('content')
    <div class="col-xs-12">
        <p>
            Before continuing, please check account verification request in your email inbox! If you don't receives it, <a
                href="{{ route('verification.resend') }}">click here</a> to request again.
        </p>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            @if(session('resent'))
            swal({
                title: 'Info',
                text: 'Email verification request has been sent, please check your email inbox!',
                type: 'info',
                showCancelButton: false,
                confirmButtonText: 'Close'
            });
            @endif
        });
    </script>
@endpush
