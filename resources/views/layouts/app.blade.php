<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Listings') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div id="app">
        <header class="py-12 bg-blue-500 border-b mb-10">
            <div class="container mx-auto">
                <h1 class="text-5xl text-center text-white font-black">
                    <a href="{{ url('/') }}">{{ config('app.name', 'Listings') }}</a>
                </h1>
                <p class="text-4xl text-center text-white font-bold mb-8">{{ config('app.tagline', 'A Directory Application') }}</p>
                <div class="pt-2 pb-2 text-center">
                    @yield('button')
                </div>
            </div>
        </header>
        <main class="container mx-auto pb-20 px-20">
            @yield('search')
            <div class="flex">
                <div class="lg:w-4/5 bg-grey-lightest text-grey-light mt-10 pr-10">
                    @yield('content')
                </div>
                <div class="lg:w-1/5 mt-10">
                    @yield('sidebar')
                </div>
            </div>
        </main>
        <footer class="container mx-auto py-6 px-20">
            <div class="flex">
                <div class="lg:w-1/2">Copyright {{ date('Y') }} {{ config('app.name', 'Listings') }}</div>
            </div>
        </footer>
    </div>
</body>
@stack('scripts')
</html>
