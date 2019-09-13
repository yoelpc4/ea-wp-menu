<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page') - {{ config('app.name') }} | Zillow Corp.</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('js/fallback.js') }}"></script>
    <![endif]-->
</head>
<body class="wp-menu skin-blue-dark card-no-border">
@include('partials.preloader')
<section id="wrapper">
    <div class="login-register" style="background-image:url('{{ asset('storage/images/default/background.jpg') }}');">
        <div class="login-box card">
            <div class="card-title text-center">
                <img src="{{ asset('storage/images/default/logo-icon.png') }}" width="93.75" height="93.75" alt="logo-icon"/>
                <img src="{{ asset('storage/images/default/logo-text.png') }}" width="192.75" height="128.5" alt="logo-text"/>
            </div>
            <div class="card-body m-b-10">
                <h2 class="text-center m-b-10">@yield('title')</h2>
                @yield('content')
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('js/auth.js') }}"></script>
@include('sweetalert::alert')
@stack('scripts')
</body>
</html>
