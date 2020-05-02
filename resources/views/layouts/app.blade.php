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
<body>
    <div id="app">
        <div class="bg-blue-200 py-6 px-20 border-b"></div>
        <header class="py-12 border-b">
            <div class="container mx-auto">
                <h1 class="text-5xl text-center text-gray-600 font-black">{{ config('app.name', 'Listings') }}</h1>
                <p class="text-4xl text-center font-bold mb-8">{{ config('app.tagline', 'A Directory Application') }}</p>
                <div class="pt-2 pb-2 text-center">
                    @yield('button')
                </div>
            </div>
        </header>
        <main class="container mx-auto">
            <div class="flex flex-col justify-start bg-grey-lightest text-grey-light mt-20 px-20">
                @yield('content')
            </div>
        </main>
    </div>
</body>
@stack('scripts')
</html>
