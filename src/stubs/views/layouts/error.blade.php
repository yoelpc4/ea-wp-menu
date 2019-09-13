<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('page') - {{ config('app.name') }} | Zillow Corp.</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
    <meta name="robots" content="noindex, nofollow">
    <link href="{{ asset('css/error.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('js/fallback.js') }}"></script>
    <![endif]-->
</head>
<body class="antialiased font-sans">
<div class="md:flex min-h-screen">
    <div class="w-full md:w-1/2 bg-white flex items-center justify-center">
        <div class="max-w-sm m-8">
            <div class="text-black text-5xl md:text-15xl font-black">
                @yield('code', 'Oh no!')
            </div>
            <div class="w-16 h-1 bg-purple-light my-3 md:my-6"></div>
            <p class="text-grey-darker text-2xl md:text-3xl font-light mb-8 leading-normal">
                @yield('message')
            </p>
            <a href="{{ route('home') }}"
               class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
                Back to Home
            </a>
        </div>
    </div>
    <div class="relative pb-full md:flex md:pb-0 md:min-h-screen w-full md:w-1/2">
        <div style="background-image: url('@yield('image')');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
        </div>
    </div>
</div>
</body>
</html>
