<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-100 h-screen">
            @include('layouts.navigation')
            <div class="flex min-h-full">
                <!-- Page Heading -->
                <header class="bg-indigo-500 w-1/6">
                    <div class="">
                        {{ $header }}
                    </div>
                </header>

                <!-- Page Content -->
                <main class="w-5/6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
