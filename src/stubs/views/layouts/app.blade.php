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
    <meta name="api-token" content="{{ Auth::user()->api_token }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    <!--[if lt IE 9]>
    <script src="{{ asset('js/fallback.js') }}"></script>
    <![endif]-->
</head>

<body class="wp-menu skin-blue-dark fixed-layout">
    @include('partials.preloader')
    <div id="main-wrapper">
        @include('partials.header')
        @include('partials.left_sidebar')
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">@yield('title')</h4>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <div class="d-flex justify-content-end align-items-center float-right">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                @yield('breadcrumbs')
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
                @include('partials.right_sidebar')
            </div>
        </div>
        @include('partials.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweetalert::alert')
    @auth()
    <script>
        async updateToken = () => axios.get("/update-token");
    </script>
    @endauth
    @stack('scripts')
    @stack('component_scripts')
</body>

</html>